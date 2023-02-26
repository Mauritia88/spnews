<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data}}`.
 */
class m230223_102242_create_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('country', [
            'country_id' => 1,
            'country' => 'Россия',
        ]);

        $this->insert('country', [
            'country_id' => 2,
            'country' => 'Беларусь',
        ]);

        $this->insert('country', [
            'country_id' => 3,
            'country' => 'Украина',
        ]);

        $this->insert('sports', [
            'sport_id' => 1,
            'sport' => 'Футбол',
        ]);

        $this->insert('sports', [
            'sport_id' => 2,
            'sport' => 'Хоккей',
        ]);

        $this->insert('sports', [
            'sport_id' => 3,
            'sport' => 'Большой теннис',
        ]);

        $this->insert('sports', [
            'sport_id' => 4,
            'sport' => 'Баскетбол',
        ]);

        $this->insert('sportsCountry', [
            'id' => 1,
            'sport_id' => 1,
            'country_id' => 1,
        ]);
        $this->insert('sportsCountry', [
            'id' => 2,
            'sport_id' => 2,
            'country_id' => 1,
        ]);
        $this->insert('sportsCountry', [
            'id' => 3,
            'sport_id' => 3,
            'country_id' => 1,
        ]);

        $this->insert('sportsCountry', [
            'id' => 4,
            'sport_id' => 4,
            'country_id' => 1,
        ]);

        $this->insert('sportsCountry', [
            'id' => 5,
            'sport_id'=>2,
            'country_id' => 2,
        ]);

        $this->insert('sportsCountry', [
            'id' => 6,
            'sport_id'=>1,
            'country_id' => 2,
        ]);

        $this->insert('user', [
            'user_id' => 1,
            'name'=> "Андрей",
            'email'=>'and@gmail.com',
            'password'=>'123456',
        ]);
        $this->insert('article', [
            'article_id' => 1,
            'title'=>'Год Ларссона после «Спартака»: поиграл в четырех клубах, редко забивал, взбесил боссов «Шальке» и фанов АИКа',
            'description'=>'Без «Спартака» не складывается.',
            'content'=>'Йордан Ларссон выдал в «Спартаке» топовый сезон-2020/21: забил в РПЛ 15 мячей (больше было только у Азмуна и Дзюбы), а клуб пропустил вперед лишь «Зенит».

Цена на Transfermarkt взлетела до 15 миллионов евро, «Вольфсбург» предлагал десятку, «Спартак», по словам Ларссона, отклонял предложения. Но после ухода Доменико Тедеско швед вообще перестал забивать и ассистировать, а потом еще и ушел, как только представилась возможность.',
            'date'=>'23.02.2023',
            'user_id'=>1,
            'status'=>0,
            'sport_id'=>1,
            'country_id'=>1,
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('article', [
            'article_id' => 1,
            'title'=>'Год Ларссона после «Спартака»: поиграл в четырех клубах, редко забивал, взбесил боссов «Шальке» и фанов АИКа',
            'description'=>'Без «Спартака» не складывается.',
            'content'=>'Йордан Ларссон выдал в «Спартаке» топовый сезон-2020/21: забил в РПЛ 15 мячей (больше было только у Азмуна и Дзюбы), а клуб пропустил вперед лишь «Зенит».

Цена на Transfermarkt взлетела до 15 миллионов евро, «Вольфсбург» предлагал десятку, «Спартак», по словам Ларссона, отклонял предложения. Но после ухода Доменико Тедеско швед вообще перестал забивать и ассистировать, а потом еще и ушел, как только представилась возможность.',
            'date'=>'23.02.2023',
            'user_id'=>1,
            'status'=>0,
            'sport_id'=>1,
            'country_id'=>1,
        ]);
        $this->delete('user', [
            'user_id' => 1,
            'name'=> "Андрей",
            'email'=>'and@gmail.com',
            'password'=>'123456',
        ]);
        $this->delete('country', [
            'country_id' => 1,
            'country' => 'Россия',
        ]);

        $this->delete('country', [
            'country_id' => 2,
            'country' => 'Беларусь',
        ]);

        $this->delete('country', [
            'country_id' => 3,
            'country' => 'Украина',
        ]);

        $this->delete('sports', [
            'sport_id' => 1,
            'sport' => 'Футбол',
        ]);

        $this->delete('sports', [
            'sport_id' => 2,
            'sport' => 'Хоккей',
        ]);

        $this->delete('sports', [
            'sport_id' => 3,
            'sport' => 'Большой теннис',
        ]);

        $this->delete('sports', [
            'sport_id' => 4,
            'sport' => 'Баскетбол',
        ]);

        $this->delete('sportsCountry', [
            'id' => 1,
            'sport_id' => 1,
            'country_id' => 1,
        ]);
        $this->delete('sportsCountry', [
            'id' => 2,
            'sport_id' => 2,
            'country_id' => 1,
        ]);
        $this->delete('sportsCountry', [
            'id' => 3,
            'sport_id' => 3,
            'country_id' => 1,
        ]);

        $this->delete('sportsCountry', [
            'id' => 4,
            'sport_id' => 4,
            'country_id' => 1,
        ]);

        $this->delete('sportsCountry', [
            'id' => 5,
            'sport_id'=>2,
            'country_id' => 2,
        ]);

        $this->delete('sportsCountry', [
            'id' => 6,
            'sport_id'=>1,
            'country_id' => 2,
        ]);

        $this->delete('user', [
            'user_id' => 1,
            'name'=> "Андрей",
            'email'=>'and@gmail.com',
            'password'=>'123456',
        ]);
    }
}
