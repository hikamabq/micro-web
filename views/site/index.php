<div class="container px-20 py-5">
    <div class="h-[300px] bg-slate-100 rounded"></div>
    <?php foreach($posts as $data): ?>
    <div>
        <b><?= $data['title'] ?></b>
        <p><?= $data['content'] ?></p>
    </div>
    <?php endforeach; ?>


    <form action="">
        <label for="" class="block">Nama Lengkap</label>
        <input type="text" class="p-2 border rounded">
    </form>
</div>