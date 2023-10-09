# Tugas Besar 1 - IF3110 Pengembangan Aplikasi Berbasis Web

## Deksripsi Aplikasi Web

Aplikasi web yang dibuat adalah sebuah platform _e-commerce_ sehingga pengguna dapat melakukan pembelian produk secara _online_. Pengguna dapat melakukan pencarian produk. Selain itu, pengguna juga dapat melakukan pembelian produk dengan menambahkannya ke dalam keranjang. Aplikasi web ini juga menyediakan fitur manajemen bagi admin untuk mengelola produk dan kategori.

## Daftar _Requirement_

## Cara Instalasi Server

1. _Clone_ repositori ini.

```sh
git clone https://gitlab.informatika.org/if3110-2023-01-36/Tugas-Besar-1.git
```

2. Ubah _current directory_ menjadi folder `Tugas-Besar-1`.

```sh
cd Tugas-Besar-1
```

3. Pastikan telah menginstal dan menjalankan aplikasi Docker.

4. _Build_ kontainer Docker atau jalankan file bat.

```sh
docker build -t tubes-1:latest .
```

```sh
./scripts/build-image.bat
```

4. Buatlah file .env baru berdasarkan .env.example (atau dengan menghapus .example dari nama file).

```sh
mv .env.example .env
```

## Cara Menjalankan Server

1. Jalankan kontainer Docker.

```sh
docker compose up -d
```

2. Akses aplikasi web di localhost dengan _port_ 8000.

```sh
http://localhost:8080/
```

3. Hentikan aplikasi web dengan menjalankan

```sh
docker compose down
```

## _Screenshot_ Tampilan Aplikasi

## Pembagian Tugas

**Anggota Kelompok**

| Nama                         | NIM      |
|------------------------------|----------|
| Ulung Adi Putra              | 13521122 |
| Naufal Baldemar Ardanni      | 13521154 |
| Dewana Gustavus Haraka Otang | 13521173 |

**<u>Server-side</u>**

| Fungsionalitas | NIM      |
|----------------|----------|
| Basis Data     | 13521122 |
| Navbar         | 13521154 |
| Home           | 13521173 |
| Search         | 13521122 |
| Keranjang      | 13521173 |
| Manage Toko    | 13521154 |
| Profile        | 13521154 |
| Login          | 13521173 |
| CRUD Produk    | 13521173 |
| CRUD User      | 13521122 |
| CRUD Keranjang | 13521154 |

**<u>Client-side</u>**

| Fungsionalitas| NIM      |
|---------------|----------|
| Navbar        | 13521154 |
| Home          | 13521173 |
| Search        | 13521122 |
| Keranjang     | 13521173 |
| Manage Toko   | 13521154 |
| Profile       | 13521154 |
| Login         | 13521173 |
| Template Card | 13521122 |