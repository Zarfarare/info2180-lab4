<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

$superheroes = [
  [
      "id" => 1,
      "name" => "Steve Rogers",
      "alias" => "Captain America",
      "biography" => "Recipient of the Super-Soldier serum, World War II hero Steve Rogers fights for American ideals as one of the world’s mightiest heroes and the leader of the Avengers.",
  ],
  [
      "id" => 2,
      "name" => "Tony Stark",
      "alias" => "Ironman",
      "biography" => "Genius. Billionaire. Playboy. Philanthropist. Tony Stark's confidence is only matched by his high-flying abilities as the hero called Iron Man.",
  ],
  [
      "id" => 3,
      "name" => "Peter Parker",
      "alias" => "Spiderman",
      "biography" => "Bitten by a radioactive spider, Peter Parker’s arachnid abilities give him amazing powers he uses to help others, while his personal life continues to offer plenty of obstacles.",
  ],
  [
      "id" => 4,
      "name" => "Carol Danvers",
      "alias" => "Captain Marvel",
      "biography" => "Carol Danvers becomes one of the universe's most powerful heroes when Earth is caught in the middle of a galactic war between two alien races.",
  ],
  [
      "id" => 5,
      "name" => "Natasha Romanov",
      "alias" => "Black Widow",
      "biography" => "Despite super spy Natasha Romanoff’s checkered past, she’s become one of S.H.I.E.L.D.’s most deadly assassins and a frequent member of the Avengers.",
  ],
  [
      "id" => 6,
      "name" => "Bruce Banner",
      "alias" => "Hulk",
      "biography" => "Dr. Bruce Banner lives a life caught between the soft-spoken scientist he’s always been and the uncontrollable green monster powered by his rage.",
  ],
  [
      "id" => 7,
      "name" => "Clint Barton",
      "alias" => "Hawkeye",
      "biography" => "A master marksman and longtime friend of Black Widow, Clint Barton serves as the Avengers’ amazing archer.",
  ],
  [
      "id" => 8,
      "name" => "T'challa",
      "alias" => "Black Panther",
      "biography" => "T’Challa is the king of the secretive and highly advanced African nation of Wakanda - as well as the powerful warrior known as the Black Panther.",
  ],
  [
      "id" => 9,
      "name" => "Thor Odinson",
      "alias" => "Thor",
      "biography" => "The son of Odin uses his mighty abilities as the God of Thunder to protect his home Asgard and planet Earth alike.",
  ],
  [
      "id" => 10,
      "name" => "Wanda Maximoff",
      "alias" => "Scarlett Witch",
      "biography" => "Notably powerful, Wanda Maximoff has fought both against and with the Avengers, attempting to hone her abilities and do what she believes is right to help the world.",
  ], 
];

?>

<?php 
    //Find the user's superhero information
    function getSuperhero($superheroes, $userSuperhero){
        foreach ($superheroes as $superhero){
            if($userSuperhero == strtolower($superhero['name'])|| $userSuperhero == strtolower($superhero['alias'])){
                return $superhero;
                
            }
        }   
        return "Superhero not found";
    }
   
    if(isset($_GET["query"])){
    $userInput = $_GET["query"];
    //Sanitize the user input
    $clean_userInput = strtolower(filter_var($userInput, FILTER_SANITIZE_STRING));
    }
    else{
        $clean_userInput ="";
    }

    if($clean_userInput == ""){
        $heroInfo = $superheroes;
        }

    else{
        $heroInfo = getSuperhero($superheroes,$clean_userInput);
    }

?>

<?php if($heroInfo == "Superhero not found"): ?>
    <h3 class="heroNotFound">SUPERHERO NOT FOUND</h3>
<?php elseif($clean_userInput == ""): ?>
    <ul>    
        <?php foreach($superheroes as $superhero): ?> 
            <li><?php echo $superhero['alias']; ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <ul>
        <h3><?= strtoupper($heroInfo['alias']); ?></h3>
        <h4>A.K.A <?= strtoupper($heroInfo['name']); ?></h4>
        <p><?php echo $heroInfo['biography']; ?></p>
    </ul>      
<?php endif; ?> 