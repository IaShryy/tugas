
<?php
$error = [];
$nama = $email = $hp = $umur = $github = $kategori = $peserta = "";

$kategoriList = ["Web Development", "Game Development", "Mobile Development"];
$pesertaList = ["Individu", "Tim"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $hp = trim($_POST["hp"] ?? "");
    $umur = trim($_POST["umur"] ?? "");
    $github = trim($_POST["github"] ?? "");
    $kategori = $_POST["kategori"] ?? "";
    $peserta = $_POST["peserta"] ?? "";

    if (strlen($nama) < 3 || strlen($nama) > 50)
        $error["nama"] = "Nama harus 3-50 karakter.";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $error["email"] = "Email tidak valid.";

    if (!preg_match("/^(08[0-9]{8,11}|\\+628[0-9]{8,11})$/", $hp))
        $error["hp"] = "Nomor HP tidak valid.";

    if (!filter_var($umur, FILTER_VALIDATE_INT) || $umur < 17 || $umur > 19)
        $error["umur"] = "Umur harus 17-19 tahun.";

    if ($github != "" && !filter_var($github, FILTER_VALIDATE_URL))
        $error["github"] = "URL GitHub tidak valid.";

    if ($github != "" && parse_url($github, PHP_URL_HOST) != "github.com")
        $error["github"] = "Harus menggunakan GitHub.";

    if (!in_array($kategori, $kategoriList, true))
        $error["kategori"] = "Pilih kategori.";

    if (!in_array($peserta, $pesertaList, true))
        $error["peserta"] = "Pilih peserta.";
}

function aman($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}
?>

<h2>Registrasi Lomba Coding</h2>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)): ?>

<h3>Registrasi Berhasil!</h3>
Nama: <?= aman($nama) ?><br>
Email: <?= aman($email) ?><br>
HP: <?= aman($hp) ?><br>
Umur: <?= aman($umur) ?><br>
GitHub: <?= aman($github) ?><br>
Kategori: <?= aman($kategori) ?><br>
Peserta: <?= aman($peserta) ?>

<?php else: ?>

<form method="POST">

<?php
$fields = [
    "nama" => "Nama",
    "email" => "Email",
    "hp" => "Nomor HP",
    "umur" => "Umur",
    "github" => "URL GitHub (Opsional)"
];

foreach ($fields as $key => $label):
?>
<?= $label ?>:
<input name="<?= $key ?>" value="<?= aman($$key) ?>"
<?= $key == "github" ? "" : "required" ?>>
<span style="color:red"><?= $error[$key] ?? "" ?></span>
<br><br>
<?php endforeach; ?>

Kategori:
<select name="kategori">
<option value="">Pilih</option>
<?php foreach ($kategoriList as $item): ?>
<option value="<?= aman($item) ?>" <?= $kategori == $item ? "selected" : "" ?>>
<?= aman($item) ?>
</option>
<?php endforeach; ?>
</select>
<span style="color:red"><?= $error["kategori"] ?? "" ?></span>
<br><br>

Peserta:<br>
<?php foreach ($pesertaList as $item): ?>
<input type="radio" name="peserta" value="<?= $item ?>"
<?= $peserta == $item ? "checked" : "" ?>>
<?= $item ?>
<?php endforeach; ?>
<span style="color:red"><?= $error["peserta"] ?? "" ?></span>

<br><br>
<button type="submit">Daftar</button>

</form>
<?php endif; ?>
