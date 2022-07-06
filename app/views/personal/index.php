    <h1>personal data</h1>
    <?php foreach($data as $personal) :?>
        <ul>
            <li><?= $personal['nam']; ?></li>    
            <li><?= $personal['job']; ?></li>    
        </ul>
    <?php endforeach; ?>