<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Dasar PHP Form - POST</title>
</head>
<body>
    <h2>Contoh Form POST</h2>
    <form method="POST" action="proses.php">
        <label for="nama">Nama</label>
        <input id= "nama" name= "nama" type="text"  placeholder= "Nama Anda">
        <br/>
        <label for="email">Email</label>
        <input id="email" name="email" type="email" placeholder= "nama@gmail.com">
        <br/>
        <label for="pesan">Pesan</label>
        <textarea name="pesan" id="pesan" rows= "4" placeholder= "Isi pesan anda"></textarea>
        <br/>
        <button type="submit">Kirim (POST)</button>
    </form>   
</body>
</html>