<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/styles/main.css" />
    <link rel="stylesheet" href="../../assets/styles/catalog.css" />
    <title>Monogatarya - Catálogo de Animes</title>
</head>

<body>
    <?php require '../../includes/header.php'; ?>

    <main class="page-main">
        <div class="layout-container">

            <section class="card-panel" aria-labelledby="catalogo-title">
                <div class="section-header">
                    <h2 id="catalogo-title" class="section-title">Catálogo de animes</h2>
                    <a class="btn btn-add" href="anime-crear.php">Crear Evento</a>
                </div>

                <!-- Página 1 -->
                <div id="manga1" class="card-grid card-grid-3">
                    <article class="content-card">
                        <img class="card-image" src="https://i.imgur.com/ZmYD4Uo.jpeg" alt="Portada de Ficha 1">
                        <h3>One Piece</h3>
                        <p>El anime más popular del momento</p>
                        <a class="btn-link" href="./lista/anime1.html">Más información</a>
                    </article>

                    <article class="content-card">
                        <img class="card-image" src="https://static.wikia.nocookie.net/cyberpunk/images/c/c1/Cyberpunk_Edgerunners_Trigger_2.jpg/revision/latest/scale-to-width-down/1200?cb=20230324074932&path-prefix=es" alt="Portada de Ficha 2">
                        <h3>Cyberpunk: Edgerunners</h3>
                        <p>Historias de un futuro donde la tecnología cambia la vida de todos</p>
                        <a class="btn-link" href="./lista/anime2.html">Más información</a>
                    </article>

                    <article class="content-card">
                        <img class="card-image" src="https://m.media-amazon.com/images/M/MV5BZTNjOWI0ZTAtOGY1OS00ZGU0LWEyOWYtMjhkYjdlYmVjMDk2XkEyXkFqcGc@._V1_.jpg" alt="Portada de Ficha 3">
                        <h3>Naruto</h3>
                        <p>La historia de un ninja que nunca se rinde y lucha por sus sueños</p>
                        <a class="btn-link" href="../../events/event-detail.html">Más información (Proximamente)</a>
                    </article>

                    <article class="content-card">
                        <img class="card-image" src="https://es.web.img3.acsta.net/c_310_420/pictures/23/07/31/10/02/0006409.jpg" alt="Portada de Ficha 4">
                        <h3>Frieren: Beyond Journey's End</h3>
                        <p>Anime mejor valorado</p>
                        <a class="btn-link" href="../../events/event-detail.html">Más información (Proximamente)</a>
                    </article>

                    <article class="content-card">
                        <img class="card-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRlx52AOnIL8Vq7yJLUK9ZwNOLUXL9Gi9-grg&s" alt="Portada de Ficha 5">
                        <h3>Kimetsu no Yaiba</h3>
                        <p>Un joven lucha contra demonios para salvar a su hermana y proteger a los demás</p>
                        <a class="btn-link" href="../../events/event-detail.html">Más información (Proximamente)</a>
                    </article>

                    <article class="content-card">
                        <img class="card-image" src="https://i0.wp.com/codigoespagueti.com/wp-content/uploads/2023/03/poster-jujutsu-kaisen-2.jpg?resize=1280%2C1810&ssl=1" alt="Portada de Ficha 6">
                        <h3>Jujutsu Kaisen</h3>
                        <p>Un estudiante de secundaria que se involucra en luchas contra espíritus malvados</p>
                        <a class="btn-link" href="../../events/event-detail.html">Más información (Proximamente)</a>
                    </article>
                    <article class="content-card">
                        <img class="card-image" src="https://m.media-amazon.com/images/M/MV5BOTIyNGIzY2EtYjMyZS00Y2M0LWE4MTktNmQ3Y2IwZTBhNWE2XkEyXkFqcGc@._V1_.jpg" alt="Portada de Ficha 7">
                        <h3>Re:Zero</h3>
                        <p>Un joven que es transportado a un mundo mágico y debe luchar por su supervivencia</p>
                        <a class="btn-link" href="../../events/event-detail.html">Más información (Proximamente)</a>
                    </article>
                    <article class="content-card">
                        <img class="card-image" src="https://m.media-amazon.com/images/M/MV5BZjI1YjZiMDUtZTI3MC00YTA5LWIzMmMtZmQ0NTZiYWM4NTYwXkEyXkFqcGc@._V1_QL75_UX190_CR0,2,190,281_.jpg" alt="Portada de Ficha 8">
                        <h3>Steins;Gate</h3>
                        <p>Un joven que descubre un experimento que le permite viajar en el tiempo</p>
                        <a class="btn-link" href="../../events/event-detail.html">Más información (Proximamente)</a>
                    </article>
                    <article class="content-card">
                        <img class="card-image" src="../../assets/img/background-image.webp" alt="Portada de Ficha 9">
                        <h3>Ficha 9</h3>
                        <p>Descripción de la ficha</p>
                        <a class="btn-link" href="../../events/event-detail.html">Más información (Proximamente)</a>
                    </article>
                </div>
            </section>

        <?php 

        echo '<div class="paginacion">'; 
        for($i=1; $i <= 10; $i++){
        echo '<a href="anime-catalog.php?page='.$i.'">'.$i.'</a>';
        }
        echo '</div>'; 
        ?>                

        </div>
        
    </main>
    <?php require '../../includes/menu.php'; ?>
    <?php require '../../includes/footer.php'; ?>
</body>

</html>