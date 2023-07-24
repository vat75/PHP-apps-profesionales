<?php $this->layout('layouts/layout', [
  'mainTitle' => 'Página 2'
]) ?>

<h1>Hola</h1>
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste numquam quas expedita sunt at animi vel, cumque officiis, maxime dolorem optio quisquam facilis quia aspernatur molestias culpa sed assumenda? Porro?</p>

<ul>
    <li>item 1</li>
    <li>item 2</li>
    <li>item 3</li>
    <li>item 4</li>
</ul>

<?php
 //Aquí comienza el contenido de los footerLinks
$this->start('footerLinks') ?>
<p>
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
</p>
<?php 
//Aquí termina el contenido del footerLinks
$this->stop() ?>