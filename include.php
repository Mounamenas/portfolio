 <?php
 /*if(!empty($_POST)){
 $nom = $_POST['nom'];
 $prenom = $_POST['prenom'];
 $email = $_POST ['email'];
 $sujet= $_POST ['sujet'];
 $message = $_POST ['message'];
 echo $nom ."<br/>". $prenom ."<br/>". $message;

}
/* echo $nom ."<br/>". $prenom ."<br/>". $message;  juste pour tester*/ 





  function getPDO() {

        $credentials = fopen("config.csv", "r");

        if ($credentials)
        {
          // Le fichier de configuration doit exister.
          $credentials = fgetcsv($credentials);
        }

        $host = $credentials[0];
        $db   = $credentials[1];
        $user = $credentials[2];
        $pass = $credentials[3];
        $charset = $credentials[4];
        $port = $credentials[5];
        
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            return new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    //  récupérer la section  à propos de moi  //
    function presentation($pdo,$lang) {
        $presentation = $pdo->query("SELECT * FROM aboutme where langue_id='$lang' ")->fetch();
        $contenu= $presentation['contenu'];
        return $contenu;
    }
// la langue  //
    function lang ($pdo,$lang) {
        $lg = $pdo->query("SELECT `trad_langue`.`langue_id`,`trad_langue`.`design_lang` , `langue`.`flag` FROM `trad_langue` Join langue ON `trad_langue`.`langue_id` = langue.`id_langue` where `trad_langue`.`langue_trad`='$lang'");

    return $lg; 

    } 
    function li_langue ($lg) {
     $deslang = $lg['design_lang'];
      $flag = $lg['flag'];
      $langtrad = $lg['langue_id'];
      $li= "<li> <a href='?lang=".$langtrad."'> ".$deslang."</a>"." "." <img src =".$flag." alt='drapeau'/> </li>";
       return $li;

        }
    
    // récupérer la catégorie programmation de la section competences//
    function categoriepr($pdo,$lang){
        $cat = $pdo-> query("SELECT categorie FROM `categories` WHERE code_cat='pr' and langue_id='$lang'")-> fetch();
        return $cat;
    }
    
    // récupérer la compétence  et le niveau dans la catégorie pr //
    function programmation($pdo,$lang){
        $prog = $pdo-> query("SELECT titre,niveau , cat_code FROM `competences` JOIN categories ON competences.cat_code=categories.code_cat WHERE     cat_code='pr' AND categories.langue_id='$lang'");
        return $prog;
    }
    function li_programmation ($prog){
      $titre = $prog['titre'];
      $niveau = $prog['niveau'];
      $catcd = $prog['cat_code'];

      $li = "<li> <span> $titre </span>"."\n";
      $li .= "<div class='container'>";
      $li .= "<div class ='skills' style='width: $niveau;'> $niveau </div>";
      $li .= "</div> </li>";
      return $li;

            }
    // récupérer la catégorie bdd de la section competences//
    function categoriebdd($pdo,$lang){
        $cat = $pdo-> query("SELECT categorie FROM `categories` WHERE code_cat='bdd' and langue_id='$lang'")-> fetch();
        return $cat;
    }
    // récupérer la compétence  et le niveau dans une catégorie bdd //
    function bdd($pdo,$lang){
        $bd = $pdo-> query("SELECT titre,niveau , cat_code FROM `competences` JOIN categories ON competences.cat_code=categories.code_cat WHERE cat_code='bdd' AND categories.langue_id='$lang'");
        return $bd;
    }
    function li_bdd($bd){
        $titre = $bd['titre'];
        $niveau = $bd['niveau'];
        $catcd = $bd['cat_code'];

        $li = "<li> <span> $titre </span>"."\n";
        $li .= "<div class='container'>";
        $li .= "<div class ='skills' style='width: $niveau;'> $niveau </div>";
         $li .= "</div> </li>";
         return $li;
            }
    // récupérer la catégorie bureautique de la section competences//
    function categoriebur($pdo,$lang){
        $cat = $pdo-> query("SELECT categorie FROM `categories` WHERE code_cat='bur' and langue_id='$lang'")-> fetch();
        return $cat;
    }
    // récupérer la compétence  et le niveau dans une catégorie bureautique //
    function bur($pdo,$lang){
        $bur = $pdo-> query("SELECT titre,niveau , cat_code FROM `competences` JOIN categories ON competences.cat_code=categories.code_cat WHERE cat_code='bur' AND categories.langue_id='$lang'");
        return $bur;
    }
    function li_bur($bur){
        $titre = $bur['titre'];
        $niveau = $bur['niveau'];
        $catcd = $bur['cat_code'];

        $li = "<li> <span> $titre </span>"."\n";
         $li .= "<div class='container'>";
         $li .= "<div class ='skills' style='width: $niveau;'> $niveau </div>";
         $li .= "</div> </li>";
         return $li;
                }
    // récupérer la catégorie designe de la section competences //
    function categoriedes($pdo,$lang){
        $cat = $pdo-> query("SELECT categorie FROM `categories` WHERE code_cat='des' and langue_id='$lang'")-> fetch();
        return $cat;
    }
    
    // récupérer la compétence  et le niveau dans une catégorie designe requete +li //
    function des($pdo,$lang){
        $des = $pdo-> query("SELECT titre,niveau , cat_code FROM `competences` JOIN categories ON competences.cat_code=categories.code_cat WHERE cat_code='des' AND categories.langue_id='$lang'");
        return $des;
    }
    function li_des($des){
        $titre = $des['titre'];
        $niveau = $des['niveau'];
        $catcd = $des['cat_code'];

        $li = "<li> <span> $titre </span>"."\n";
        $li .= "<div class='container'>";
        $li .= "<div class ='skills' style='width: $niveau;'> $niveau </div>";
        $li .= "</div> </li>";
        return $li;

                }

    // récupérer la catégorie jp de la section competences//
    function categoriejp($pdo,$lang){
        $cat = $pdo-> query("SELECT categorie FROM `categories` WHERE code_cat='jp' and langue_id='$lang'")-> fetch();
        return $cat;
    }
    // récupérer la compétence  et le niveau dans une catégorie gestion de projet //
    function jp($pdo,$lang){
        $jp = $pdo-> query("SELECT titre,niveau , cat_code FROM `competences` JOIN categories ON competences.cat_code=categories.code_cat WHERE cat_code='jp' AND categories.langue_id='$lang'");
        return $jp;
    }
    function li_jp($jp){
        $titre = $jp['titre'];
        $niveau = $jp['niveau'];
        $catcd = $jp['cat_code'];

        $li = "<li> <span> $titre </span>"."\n";
        $li .= "<div class='container'>";
        $li .= "<div class ='skills' style='width: $niveau;'> $niveau </div>";
        $li .= "</div> </li>";
        return $li;
    }
    // récupérer la catégorie langues de la section competences//
    function categorielg($pdo,$lang){
        $cat = $pdo-> query("SELECT categorie FROM `categories` WHERE code_cat='lg' and langue_id='$lang'")-> fetch();
        return $cat;
    }
    // récupérer la compétence  et le niveau dans une catégorie langues//
    function lg($pdo,$lang){
        $lg = $pdo-> query("SELECT trad_langue.design_lang,competences.niveau ,cat_code  FROM trad_langue JOIN competences ON competences.titre=trad_langue.langue_id WHERE trad_langue.langue_trad='$lang' and cat_code='lg'");
        return $lg;
    }
    function li_lg($lg){
        $titre = $lg['design_lang'];
        $niveau = $lg['niveau'];
        $catcd = $lg['cat_code'];

        $li = "<li> <span> $titre </span>"."\n";
        $li .= "<div class='container'>";
        $li .= "<div class ='skills' style='width: $niveau;'> $niveau </div>";
        $li .= "</div> </li>";
        return $li;
    }
    // partie expériences professionnelles//
    function experiences($pdo,$lang){
        $exp =$pdo-> query(" SELECT experiences.date_debut, experiences.date_fin,  ville,poste,entreprise,pays FROM experiences JOIN exp ON experiences.id_exp=exp.exp_id AND langue_id='$lang'");
        return $exp;
    }
    function li_experience($exp){
        $date_debut = $exp['date_debut'];
        $date_fin = $exp['date_fin'];
        $poste = $exp['poste'];
        $entreprise = $exp['entreprise'];
        $ville = $exp['ville'];
        $pays = $exp ['pays'];

        $li = "<li class='timeline_content'> <span class ='date'> $date_debut - $date_fin : </span> " ;
        $li.=" <span class='titre'> $poste</span> <br/>";
        $li.="<span class='entreprise'> $entreprise</span> <br/>";
        $li.=" <span class='lieu'> $ville , $pays</span>";
        return $li;
    }

    // récupérer formations et li formation//   
    function formations($pdo,$lang){
        $form =$pdo-> query("SELECT formations.date_debut, formations.date_fin,titre,specialite,etablissement,ville,pays FROM formations JOIN form ON formations.id_formation=form.formation_id AND langue_id='$lang'");

        return $form;
    } 

    function li_formation($form){
        $date_debut=$form['date_debut'];
        $date_fin=$form['date_fin'];
        $titre = $form['titre'];
        $specialite = $form['specialite'];
        $etablissement = $form['etablissement'];
        $ville = $form['ville'];
        $pays = $form['pays'];

        $li = "<li> <span class ='date'> $date_debut - $date_fin : </span> " ;
        $li.=" <span class='titre'> $titre</span> <br/>";
        $li.=" <span class='specialite'> $specialite</span> <br/>";
        $li.="<span class='entreprise'> $etablissement</span> <br/>";
        $li.=" <span class='lieu'> $ville , $pays</span>";
        return $li;

    }  
    //  partie réalisations // 
    function realisations($pdo,$lang){
        $real = $pdo-> query("SELECT * from realisations JOIN realis ON realisations.id_realisations = realis.realisations_id AND realis.langue_id ='$lang'");
        return $real;
    }
     function li_realisation($real){
        $categorie_real = $real['categorie_real'];
        $src = $real['src'];
        $titre = $real['titre'];
         
        $li= "<img class='miniature' src='$src' title='$categorie_real-$titre-' alt='$categorie_real' onmouseover='show(this);'/> " ."\n";
        return $li;



     }

    // la partie formulaire de contact // 
    function formulaire($pdo,$nom,$prenom,$email,$sujet,$message){
     $insert = $pdo->prepare("INSERT INTO `contact`( `nom`,`prenom`,`email`,`sujet`,`message`)VALUES(?,?,?,?,?)");
     $insert-> execute([$nom ,$prenom , $email ,$sujet ,$message ]);

       
          }


    
        

    







?>