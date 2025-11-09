// Impor kelas yang Anda butuhkan dari paket 'appwrite'
import { Client, Account } from 'appwrite';

// 1. Buat instance Client
const client = new Client();

// 2. Atur konfigurasi Client
client
    .setEndpoint('https://sgp.cloud.appwrite.io/v1') // Salin dari Dashboard Appwrite
    .setProject('6909f1fb0014fe4fcf1f');          // Salin dari Dashboard Appwrite

// 3. (Opsional tapi direkomendasikan) 
// Aktifkan pengecekan status login otomatis
// Ini akan membantu jika Anda kembali dari halaman login GitHub
client.setSessionHandling(true); 

// 4. Ekspor layanan yang ingin Anda gunakan di file lain
// Kita ekspor 'account' karena kita akan membutuhkannya untuk login
export const account = new Account(client);

// Anda juga bisa ekspor 'client' jika perlu
export { client };