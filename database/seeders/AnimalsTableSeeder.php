<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('animals')->insert([
            [
                'animal_id' => 1,
                'animal_common_name' => 'Chamois',
                'animal_scientific_name' => 'Rupicapra rupicapra',
                'animal_description' => 'Animal agile aux pattes fines et aux cornes recourbées, généralement de couleur brunâtre avec un ventre plus clair.',
                'animal_image_src' => 'chamois',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 2,
                'animal_common_name' => 'Cerf élaphe',
                'animal_scientific_name' => 'Cervus elaphus',
                'animal_description' => 'Grand mammifère au pelage brun roux, avec un large ramure chez les mâles, visible principalement en automne lors du brame.',
                'animal_image_src' => 'cerf_elaphe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 3,
                'animal_common_name' => 'Chevreuil',
                'animal_scientific_name' => 'Capreolus capreolus',
                'animal_description' => 'Animal de taille moyenne avec un pelage brun-roux, une queue courte et des petites cornes chez les mâles.',
                'animal_image_src' => 'chevreuil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 4,
                'animal_common_name' => 'Sanglier',
                'animal_scientific_name' => 'Sus scrofa',
                'animal_description' => 'Grand mammifère au pelage brun-gris, avec une tête massive et des défenses visibles chez les mâles.',
                'animal_image_src' => 'sanglier',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 5,
                'animal_common_name' => 'Renard roux',
                'animal_scientific_name' => 'Vulpes vulpes',
                'animal_description' => 'Animal rusé au pelage roux avec un ventre blanc et une queue touffue, souvent aperçu au crépuscule.',
                'animal_image_src' => 'renard_roux',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 6,
                'animal_common_name' => 'Lynx boréal',
                'animal_scientific_name' => 'Lynx lynx',
                'animal_description' => 'Grand félin avec un pelage tacheté, des oreilles pointues avec des touffes de poils et une queue courte.',
                'animal_image_src' => 'lynx_boreal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 7,
                'animal_common_name' => 'Hermine',
                'animal_scientific_name' => 'Mustela erminea',
                'animal_description' => 'Petit mammifère au pelage brun en été, devenant blanc en hiver, avec une queue courte et fine.',
                'animal_image_src' => 'hermine',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 8,
                'animal_common_name' => 'Grand tétras',
                'animal_scientific_name' => 'Tetrao urogallus',
                'animal_description' => 'Grand oiseau aux plumes brunes et noires, le mâle possède un plumage plus coloré avec une queue en forme d\'éventail.',
                'animal_image_src' => 'grand_tetras',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 9,
                'animal_common_name' => 'Buse variable',
                'animal_scientific_name' => 'Buteo buteo',
                'animal_description' => 'Rapace de taille moyenne avec un plumage varié, souvent brun foncé, et une queue courte.',
                'animal_image_src' => 'buse_variable',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 10,
                'animal_common_name' => 'Faucon crécerelle',
                'animal_scientific_name' => 'Falco tinnunculus',
                'animal_description' => 'Petit rapace avec un plumage beige et des motifs foncés, souvent vu en vol stationnaire.',
                'animal_image_src' => 'faucon_crecerelle',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 11,
                'animal_common_name' => 'Pic noir',
                'animal_scientific_name' => 'Dryocopus martius',
                'animal_description' => 'Grand pic avec un plumage entièrement noir et un bec robuste, souvent aperçu dans les forêts de conifères.',
                'animal_image_src' => 'pic_noir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 12,
                'animal_common_name' => 'Geai des chênes',
                'animal_scientific_name' => 'Garrulus glandarius',
                'animal_description' => 'Corvidé coloré avec un plumage brun, des ailes bleu et noir, et un cri strident caractéristique.',
                'animal_image_src' => 'geai_des_chenes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 13,
                'animal_common_name' => 'Mésange charbonnière',
                'animal_scientific_name' => 'Parus major',
                'animal_description' => 'Petite mésange au plumage jaune vif, avec une tête noire et des joues blanches.',
                'animal_image_src' => 'mesange_charbonniere',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 14,
                'animal_common_name' => 'Hibou grand-duc',
                'animal_scientific_name' => 'Bubo bubo',
                'animal_description' => 'Grand rapace nocturne avec un plumage brun, des touffes d\'oreilles et des yeux jaunes perçants.',
                'animal_image_src' => 'hibou_grand_duc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 15,
                'animal_common_name' => 'Salamandre tachetée',
                'animal_scientific_name' => 'Salamandra salamandra',
                'animal_description' => 'Amphibien noir avec des taches jaunes, souvent trouvé dans des environnements humides.',
                'animal_image_src' => 'salamandre_tachetee',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 16,
                'animal_common_name' => 'Crapaud commun',
                'animal_scientific_name' => 'Bufo bufo',
                'animal_description' => 'Amphibien robuste avec une peau rugueuse et des couleurs allant du brun au gris.',
                'animal_image_src' => 'crapaud_commun',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 17,
                'animal_common_name' => 'Vipère aspic',
                'animal_scientific_name' => 'Vipera aspis',
                'animal_description' => 'Serpent venimeux au corps trapu, généralement gris ou brun avec un motif en zigzag.',
                'animal_image_src' => 'vipere_aspic',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 18,
                'animal_common_name' => 'Lézard vivipare',
                'animal_scientific_name' => 'Zootoca vivipara',
                'animal_description' => 'Petit lézard souvent de couleur brune ou verte, capable de donner naissance à des jeunes vivants.',
                'animal_image_src' => 'lezard_vivipare',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 19,
                'animal_common_name' => 'Papillon citron',
                'animal_scientific_name' => 'Gonepteryx rhamni',
                'animal_description' => 'Papillon jaune pâle avec des ailes en forme de feuille, très actif au printemps.',
                'animal_image_src' => 'papillon_citron',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 20,
                'animal_common_name' => 'Lucane cerf-volant',
                'animal_scientific_name' => 'Lucanus cervus',
                'animal_description' => 'Grand coléoptère noir, les mâles ont de grandes mandibules en forme de cornes.',
                'animal_image_src' => 'lucane_cerf_volant',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 21,
                'animal_common_name' => 'Abeille sauvage',
                'animal_scientific_name' => 'Andrena spp.',
                'animal_description' => 'Insecte pollinisateur souvent vu autour des fleurs, avec un corps velu et une coloration variable.',
                'animal_image_src' => 'abeille_sauvage',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 22,
                'animal_common_name' => 'Cétoine dorée',
                'animal_scientific_name' => 'Cetonia aurata',
                'animal_description' => 'Coléoptère au corps métallique vert doré, souvent trouvé sur les fleurs.',
                'animal_image_src' => 'cetoine_doree',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 23,
                'animal_common_name' => 'Truite fario',
                'animal_scientific_name' => 'Salmo trutta fario',
                'animal_description' => 'Poisson d\'eau douce au corps fuselé, avec un dos olive et des taches noires sur les flancs.',
                'animal_image_src' => 'truite_fario',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 24,
                'animal_common_name' => 'Ombre commun',
                'animal_scientific_name' => 'Thymallus thymallus',
                'animal_description' => 'Poisson de rivière au corps allongé, avec une nageoire dorsale proéminente et une coloration argentée.',
                'animal_image_src' => 'ombre_commun',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}