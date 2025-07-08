# APIs
# bahan

- Get : All
```
/api/v1/bahan
```
- Get : find {id}
```
/api/v1/bahan/{id}
```
- Post : create
```
/api/v1/bahan/
```
```
{
    "nama": "Jahe",
    "deskripsi": "Rasa pahit, bagus untuk daya tahan tubuh.",
    "harga": 1200,
    "jenis": "Bahan utama",
    "foto": "asset/img/jahe.png"
}
```
- Detele : Delete {id}
```
/api/v1/bahan/{id}
```
- Put : Update {id}
```
/api/v1/bahan/{id}
```
```
{
    "nama": "Sirsak",
    "deskripsi": "Rasa pahit, bagus untuk daya tahan tubuh.",
    "harga": 1200,
    "jenis": "Bahan utama",
    "foto": "asset/img/jahe.png"
}
```
# keranjang

- Get : All
```
/api/v1/keranjang
```
- Get : find {id}
```
/api/v1/keranjang/{id}
```
- Post : create
```
/api/v1/keranjang/
```
```
{
    "bahan_id": 5,
    "porsi": 10
}

```
- Detele : Delete {id}
```
/api/v1/keranjang/{id}
```
- Put : Update {id}
```
/api/v1/keranjang/{id}
```
```
{
    "bahan_id": 4,
    "porsi": 100
}

```
# racikan

- Get : All
```
/api/v1/racikan
```
- Get : find {id}
```
/api/v1/racikan/{id}
```
- Post : create
```
/api/v1/racikan/
```
```
{
    "nama": "Jamu Kunyit Manis",
    "details": [
        {
            "bahan_id": 1,
            "racikan_id": 1,
            "porsi":3
        },
        {
            "bahan_id": 2,
            "racikan_id": 1,
            "porsi":3
        }
    ]
}

```
- Detele : Delete {id}
```
/api/v1/racikan/{id}
```
- Put : Update {id}
```
/api/v1/racikan/{id}
```
```
{
    "nama": "Jamu Kunyit Manis",
    "details": [
        {
            "bahan_id": 1,
            "racikan_id": 1,
            "porsi":3
        },
        {
            "bahan_id": 2,
            "racikan_id": 1,
            "porsi":99
        }
    ]
}
```
