


<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <br><br>
    <div class="row">
        <?php
        // Array of card data
        $cards = [
            ['color' => 'primary', 'label' => 'total album', 'table' => 'album'],
            ['color' => 'warning', 'label' => 'total foto', 'table' => 'foto'],
            ['color' => 'success', 'label' => 'total komentar', 'table' => 'komentar'],
            ['color' => 'danger', 'label' => 'total like', 'table' => 'likefoto']
        ];

        // Loop through the card data
        foreach ($cards as $card) {
            $result = mysqli_query($koneksi, "SELECT * FROM {$card['table']}");
            $count = mysqli_num_rows($result);
            ?>
            <style>
    .custom-card {
        background-color: #6f42c1; /* Warna ungu */
        border-radius: 0.5rem;
    }
    .custom-card:hover {
        background-color: #5a32a3; /* Warna ungu lebih gelap saat hover */
    }
</style>

<div class="col-xl-3 col-md-6">
    <div class="card custom-card text-white mb-4">
        <div class="card-body"><?= $count ?> <?= $card['label'] ?></div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#">View Details</a>
            <div class="small text-white">
                <svg class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                    <path fill="currentColor" d="M246.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 41.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

            <?php
        }
        ?>
    </div>
</div>
