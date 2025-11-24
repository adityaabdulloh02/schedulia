<?php

namespace App\Events;

use App\Models\Pengumuman;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PengumumanBaru implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $pengumuman;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Pengumuman $pengumuman)
    {
        $this->pengumuman = $pengumuman;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $jadwalKuliah = $this->pengumuman->jadwalKuliah;
        $kelasId = $jadwalKuliah->kelas_id;
        $matakuliahId = $jadwalKuliah->pengampu->matakuliah_id;

        $approvedMahasiswaIds = \App\Models\PengambilanMK::where('matakuliah_id', $matakuliahId)
            ->where('status', 'approved')
            ->join('mahasiswa', 'pengambilan_mk.mahasiswa_id', '=', 'mahasiswa.id')
            ->where('mahasiswa.kelas_id', $kelasId)
            ->pluck('pengambilan_mk.mahasiswa_id')
            ->unique()
            ->toArray();

        $channels = [];
        foreach ($approvedMahasiswaIds as $mahasiswaId) {
            $channels[] = new PrivateChannel('mahasiswa.' . $mahasiswaId);
        }

        return $channels;
    }

    public function broadcastAs()
    {
        return 'pengumuman-baru';
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        $this->pengumuman->load(['jadwalKuliah.pengampu.matakuliah', 'jadwalKuliah.kelas', 'dosen', 'jadwalKuliah.hari', 'jadwalKuliah.ruang']);

        return [
            'id' => $this->pengumuman->id,
            'tipe' => $this->pengumuman->tipe,
            'pesan' => $this->pengumuman->pesan,
            'created_at' => $this->pengumuman->created_at->toDateTimeString(),
            'dosen' => [
                'nama' => $this->pengumuman->dosen->nama_dosen,
            ],
            'jadwal_kuliah' => [
                'id' => $this->pengumuman->jadwalKuliah->id,
                'hari' => $this->pengumuman->jadwalKuliah->hari->nama_hari,
                'jam_mulai' => $this->pengumuman->jadwalKuliah->jam_mulai,
                'jam_selesai' => $this->pengumuman->jadwalKuliah->jam_selesai,
                'ruang' => $this->pengumuman->jadwalKuliah->ruang->nama_ruang,
                'matakuliah' => [
                    'nama' => $this->pengumuman->jadwalKuliah->pengampu->matakuliah->nama_matakuliah,
                ],
                'kelas' => [
                    'nama' => $this->pengumuman->jadwalKuliah->kelas->nama_kelas,
                ],
            ],
        ];
    }
}
