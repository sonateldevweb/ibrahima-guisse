<?php
            require "../autoload/Autoloader.php";
            Autoloader::autoreg();
            
            $booltable=1;
            $boolcolonne=1;
            $boolvaleur=1;
            if(isset($_POST['Rechercher']))
            {
                if(!empty($_POST['table']))
                
                    $table=$_POST['table'];
                else
                $booltable=0;

                if(!empty($_POST['colonne']))
                $colonne=$_POST['colonne'];
                else
                $boolcolonne=0;

                if(!empty($_POST['valeur']))
                $valeur=$_POST['valeur'];
                else
                $boolvaleur=0;

                if(isset($table) && $boolcolonne=0 && $boolvaleur=0)
                {
                    $service= new EtudiantService();
                    
                    foreach($service->findAll($table) as $donne)
                    {
                        
                    }
                }
            }
            ?>