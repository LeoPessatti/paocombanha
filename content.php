<?php
/**
 * Código criado e pertencente exclusivamente a Leonardo Pessatti.
 * www.facebook.com/leopessatti
 * Created on : 29/03/2017, 20:48:08
 * Author: Leonardo Pessatti <lpessatti@gmail.com>
 */
//Resultados por página
$limit = 5;
//Tabela do banco
$tabela = 'posts';
//Define e manipula o offset como necessário
$offset = $_GET['pagina'];
$pagina = $_GET['pagina'];
--$offset;
if (!$offset) {
    $offseta = 0;
}
$offseta = $offset * $limit;

//sql
$conPosts = 'select * from vw_posts LIMIT ' . $offseta . ',' . $limit;
$posts = mysqli_query($link, $conPosts);
?>    

<div id="content">
    <!-- Post -->

    <?php
//Montagem das miniaturas dos posts em si
    while ($linha = mysqli_fetch_array($posts)) {
        $text = substr($linha[conteudo], 0, 800) . '...';
        $src = 'data: image/png;charset=utf-8;base64, "' . $linha[preview] . '"';
        ?>
        <div class="row">
            <div class="card large col s10 m8 l6 offset-l3 offset-s1 offset-m2" style="height: 33em">
                <div class="card-image">
                    <img src="data: image/jpg;charset=utf-8;base64, <?php echo $linha[preview]; ?>" alt=\"\" />
                    <span class="card-title" style="text-shadow: 2px 2px 2px white;"><a href="index.php?post=<?php echo $linha[id] ?> "><h2><?php echo $linha[titulo]; ?></h2></a></span>
                </div>
                <div class="card-content" style="margin-bottom: -30%;" >
                    <p><?php echo $text; ?></p>
                </div>
                <div class="card-action" style="padding: 0.5% 0 0.5% 0">
                    <table>
                        <tr >
                            <td>
                                <a href="index.php?post=<?php echo $linha[id] ?> ">Continue Lendo</a>
                            </td>
                            <td>
                                <div id="social">
                                    <a href="http://www.facebook.com/leopessatti" target="parent"> <img src="img/facebook.png"/> </a>
                                    <a href="https://twitter.com/LeoPessatti" target="parent"> <img src="img/twitter.png"/> </a>
                                    <a href="https://twitter.com/LeoPessatti" target="parent"> <img src="img/insta.png"/> </a>
                                    <a href="https://twitter.com/LeoPessatti" target="parent"> <img src="img/linkedin.png"/> </a>
                                    <a href="https://plus.google.com/u/0/115983505734612118081/about" target="parent"> <img src="img/g+.png"/> </a>
                                </div>
                            </td>
                        </tr> 
                    </table>
                </div>
            </div>        
        </div>  
        <?php
    }
//    echo '"' . $linha[preview] . '"';
    ?>

</div>