<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    
    <link href="https://stackpath.bootstrapcdn.com/
    font-awesome/4.7.0/css/font-awesome.min.css" 
    rel="stylesheet">

  
</head>
<body>
    <header>
        <a href="#" class="logo">SA universite</a>
        <div class="menu-toggle"></div>
        <nav>
            <ul>
                <li><a href="#" class="active">Aceuil</a></li>
                <li><a href="register.php">Ajouter Etudiant</a></li>
                <li><a href="#">Lister Boursiers</a></li>
                <li><a href="AjoutchambreBati.php">Ajout batiment</a></li>
                <li><a href="Ajoutchambre.php">Ajout Chambre</a></li>
                <li><a href="#">Find</a></li>
                <li><a href="#">FindAll</a></li>
                </li>
            </ul>
        </nav> 
        <div class="clearfix"></div>
    </header>
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script>
  $(document).ready(function(){
      $(".menu-toggle").click(function(){
        $(".menu-toggle").toggleClass("active");
        $("nav").toggleClass("active");
      });
  })
  </script>
</body>
</html>