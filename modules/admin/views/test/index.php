<table id="example" class="display table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
</table>

<?php
$urlData = \yii\helpers\Url::to(['test/data']);
$script = <<<JS
new DataTable('#example', {
    ajax: '$urlData',
    processing: true,
    serverSide: true
});
// $(document).ready(function() {
//     $('#example').DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: '$urlData',
//         order: [[0, 'desc']]
//     });
// });
JS;
$this->registerJs($script);
?>
