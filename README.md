# Tugas Besar _Milestone_ 2 IF3110 - _PHP App_

## Deskripsi Aplikasi Web

Aplikasi web yang dibuat adalah sebuah platform _e-commerce_ sehingga pengguna dapat melakukan pembelian produk secara _online_. Pengguna dapat melakukan pencarian produk. Selain itu, pengguna juga dapat melakukan pembelian produk dengan menambahkannya ke dalam keranjang. Aplikasi web ini juga menyediakan fitur manajemen bagi admin untuk mengelola produk dan kategori.

## Daftar _Requirement_
1. _Browser_
2. Docker
   
## Cara Instalasi Server

1. _Clone_ repositori ini.

```sh
git clone https://gitlab.informatika.org/if3110-2023-02-36/PHP-App.git
```

2. Ubah _current directory_ menjadi folder `PHP-App`.

```sh
cd PHP-App
```

3. Pastikan telah menginstal dan menjalankan aplikasi Docker.

4. _Build_ kontainer Docker atau jalankan file bat.

```sh
docker build -t if3110-2023-02-36-php-app:latest .
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
http://localhost:8000/
```

3. Hentikan aplikasi web dengan menjalankan

```sh
docker compose down
```

## Tangkapan Layar Tampilan Aplikasi

### Login
![Login Page](./img/login.png)

### Register
![Register Page](./img/register.png)

### Home
![Home Page](./img/home.png)

### Product
![Product Page](./img/product.png)

### Add Product
![Edit Product Page](./img/editproduct.png)

### Profile
![Profile Page](./img/profile.png)

### Edit Profile
![Edit Profile Page](./img/editprofile.png)

### Cart Profile
![Cart Page](./img/cart.png)

### Category Profile
![Category Page](./img/category.png)

## Pembagian Tugas

### Anggota Kelompok
**Kelompok 36**
| Nama                         | NIM      |
|------------------------------|----------|
| Ulung Adi Putra              | 13521122 |
| Naufal Baldemar Ardanni      | 13521154 |
| Dewana Gustavus Haraka Otang | 13521173 |

### _Server-side_

| Fungsionalitas                |           NIM                 |
|-------------------------------|-------------------------------|
|Cart                           | 13521122, 13521154, 13521173  | 
|Category                       | 13521122                      |
|Pagination                     | 13521173                      |
|Login                          | 13521173                      |
|Register                       | 13521173                      |
|Search, sort, filter           | 13521122                      |
|Product                        | 13521122                      |
|Product Files                  | 13521122                      |
|Profile                        | 13521154, 13521173            |
|Debounce                       | 13521173                      |
|Database                       | 13521122                      |
|Routing                        | 13521173                      |
|Home                           | 13521122, 13521173            |

### _Client-side_

| Fungsionalitas                |           NIM                 |
|-------------------------------|-------------------------------|
|Cart                           | 13521122, 13521154            | 
|Category                       | 13521122, 13521173            |
|Pagination                     | 13521173                      |
|Login                          | 13521173                      |
|Register                       | 13521173                      |
|Search, sort, filter           | 13521122                      |
|Product                        | 13521122                      |
|Product Files                  | 13521122                      |
|Profile                        | 13521154                      |
|Debounce                       | 13521173                      |
|Home                           | 13521122, 13521173            |
|Navbar                         | 13521154                      |
|Styling                        | 13521173                      |
|Responsive                     | 13521122, 13521173            |

### Bonus
| Fungsionalitas                |           NIM                 |
|-------------------------------|-------------------------------|
|Docker                         | 13521173                      |

### PHP App (Revisi/Tambahan)
| Fungsionalitas                |           NIM                 |
|-------------------------------|-------------------------------|
| Backend Fungsi X              | 13521122, 13521154, 13521173  | 
| ...                           | ...                           | 