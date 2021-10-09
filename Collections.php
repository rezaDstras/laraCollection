<?php

class Collections
{
/*
|--------------------------------------------------------------------------
| SUM COLLECTION
|--------------------------------------------------------------------------
*/
    public function sum()
    {
        $data = [10, 20, 30];
        return collect($data)->sum();

        //result => 60
    }
    public function CollectionSum()
    {
        $data = [
            ['price'=>2000,'tax'=>15],
            ['price'=>1000,'tax'=>10],
            ['price'=>3000,'tax'=>20]
        ];
        return collect($data)->sum('price');

        //result => 6000
    }
    public function sumPricePlusTax()
    {
        $data = [
            ['price'=>2000,'tax'=>15],
            ['price'=>1000,'tax'=>10],
            ['price'=>3000,'tax'=>20]
        ];
        return collect($data)->sum(function ($value){
            return $value['price'] + $value['tax'];
        });

        //result => 6045
    }
    public function sumWithCondition()
    {
        $data = [
            ['price'=>2000,'tax'=>15,'active'=>true],
            ['price'=>1000,'tax'=>10,'active'=>false],
            ['price'=>3000,'tax'=>20,'active'=>true]
        ];

        return collect($data)->sum(function ($value){
            if ( ! $value['active'] ){
                return null;
            }
            return $value['price'] + $value['tax'];
        });

        //result => 5035
    }
/*
|--------------------------------------------------------------------------
| AVERAGE COLLECTION
|--------------------------------------------------------------------------
*/
    public function average()
    {
        $data = [10,20,30];
        return collect($data)->average();

        //result => 20
    }
    public function collectionAverage()
    {
        $data = [
            ['price'=>2000,'tax'=>15],
            ['price'=>1000,'tax'=>10],
            ['price'=>3000,'tax'=>20]
        ];
        return collect($data)->average('price');

        //result =>2000
    }
    public function averagePricePlusTax()
    {
        $data = [
            ['price'=>2000,'tax'=>15],
            ['price'=>1000,'tax'=>10],
            ['price'=>3000,'tax'=>20]
        ];
        return collect($data)->average(function ($value){
            return $value['price'] + $value['tax'];
        });

        //result => 2015
    }
    public function averageWithCondition()
    {
        $data = [
            ['price'=>2000,'tax'=>15,'active'=>true],
            ['price'=>1000,'tax'=>10,'active'=>false],
            ['price'=>3000,'tax'=>20,'active'=>true]
        ];

        return collect($data)->average(function ($value){
            if ( ! $value['active'] ){
                return null;
            }
            return $value['price'] + $value['tax'];
        });

       //result => 2517.5
    }
/*
|--------------------------------------------------------------------------
| MAXIMUM COLLECTION
|--------------------------------------------------------------------------
*/
    public function max()
    {
        $data = [10,20,30];
        return collect($data)->max();

        //result => 30
    }
    public function collectionMaximum()
    {
        $data = [
            ['price'=>2000,'tax'=>15],
            ['price'=>1000,'tax'=>10],
            ['price'=>3000,'tax'=>20]
        ];
        return collect($data)->max('price');

        //result =>3000
    }
    public function maxPricePlusTax()
    {
        $data = [
            ['price'=>2000,'tax'=>15],
            ['price'=>1000,'tax'=>10],
            ['price'=>3000,'tax'=>20]
        ];
        return collect($data)->max(function ($value){
            return $value['price'] + $value['tax'];
        });

        //result => 3025
    }
    public function maxWithCondition()
    {
        $data = [
            ['price'=>2000,'tax'=>15,'active'=>true],
            ['price'=>1000,'tax'=>10,'active'=>false],
            ['price'=>3000,'tax'=>20,'active'=>false]
        ];

        return collect($data)->max(function ($value){
            if ( ! $value['active'] ){
                return null;
            }
            return $value['price'] + $value['tax'];
        });

        //result => 2015
    }
/*
|--------------------------------------------------------------------------
| MEDIAN COLLECTION
|--------------------------------------------------------------------------
*/
    public function median()
    {
        $data = [1000,2500,3000];
        return collect($data)->median();
        //result => 2500

        //other example
        $data = [1000,2000,3000,400];
        return collect($data)->median();
        //result => 2500
    }
    public function collectionMedian()
    {
        $data = [
            ['price'=>2000,'tax'=>15],
            ['price'=>1000,'tax'=>10],
            ['price'=>3000,'tax'=>20]
        ];
        return collect($data)->median('price');

        //result =>2000
    }
/*
|--------------------------------------------------------------------------
| MINIMUM COLLECTION
|--------------------------------------------------------------------------
*/
    public function min()
    {
        $data = [10,20,30];
        return collect($data)->min();

        //result => 10
    }
    public function collectionMinimum()
    {
        $data = [
            ['price'=>2000,'tax'=>15],
            ['price'=>1000,'tax'=>10],
            ['price'=>3000,'tax'=>20]
        ];
        return collect($data)->min('price');

        //result =>1000
    }
    public function minPricePlusTax()
    {
        $data = [
            ['price'=>2000,'tax'=>15],
            ['price'=>1000,'tax'=>10],
            ['price'=>3000,'tax'=>20]
        ];
        return collect($data)->min(function ($value){
            return $value['price'] + $value['tax'];
        });

        //result => 1010
    }
    public function minWithCondition()
    {
        $data = [
            ['price'=>2000,'tax'=>15,'active'=>true],
            ['price'=>1000,'tax'=>10,'active'=>false],
            ['price'=>3000,'tax'=>20,'active'=>true]
        ];

        return collect($data)->min(function ($value){
            if ( ! $value['active'] ){
                return null;
            }
            return $value['price'] + $value['tax'];
        });

        //result => 2015
    }
/*
|--------------------------------------------------------------------------
| COLLAPSE COLLECTION
|--------------------------------------------------------------------------
*/
    public function collapse()
    {
        $data = [
            [1,2,3],
            [4,5,6],
        ];
        return collect($data)->collapse();
        //result => 1,2,3,4,5,6

        //return collect($data)->collapse()->first();
        //result =>1
    }
    public function collapseIntoArray()
    {
        $data1 = [
            [0=>'first'],
            [0=>'second'],
            [2,3,4],
        ];
        $data2 = [
            [0=>['first']],
            [0=>['second']],
            [2,3,4],
        ];
        return collect($data1)->collapse();
        //result =>
        // 0=>first,
        //1=>second,
        //2=>2,
        //3=>3,
        //4=>4

        return collect($data2)->collapse();
        //result =>
        // 0=>[first],
        //1=>[second],
        //2=>2,
        //3=>3,
        //4=>4

        //return collect($data)->collapse()->first();
        //result =>
        //0=>first
    }
/*
|--------------------------------------------------------------------------
| CHUNK COLLECTION
|--------------------------------------------------------------------------
|  IF YOU WANTED TO COMBINED A CHUNKED COLLECTION YOU WOULD USE COLLAPSE
*/
    public function chunk()
    {
        $data = [
         1,2,3,4,5,6,7,8
        ];
        return collect($data)->chunk(4);
        //result =>
        // [
        //      0=>1,
        //      1=>2,
        //      2=>3,
        //      3=>4
        // ],
        // [
        //      4=>5,
        //      5=>6,
        //      6=>7,
        //      7=>8
        // ]


        //return collect($data)->collapse()->first();
        //result =>
        // [
        //      0=>1,
        //      1=>2,
        //      2=>3,
        //      3=>4
        // ],
    }
/*
|--------------------------------------------------------------------------
| COMBINE COLLECTION
|--------------------------------------------------------------------------
*/
    public function combine()
    {
        $data = collect(['key1','key2']);
        return $data->combine([
            ['value1'=>'ehsan','value3'=>'reza'],
            ['value2'=>'sara'],
        ]);
        //result =>
        //{
        //  "key1": {
        //      "value1": "ehsan",
        //      "value3": "reza"
        //},
        //  "key2": {
        //      "value2": "sara"
        //}
        //}

        //return $data->combine([['value1'=>'ehsan','value3'=>'reza'],['value2'=>'sara']])->first();
        //result =>
        //{
        //  "value1": "ehsan",
        //  "value3": "reza"
        //}
    }
/*
|--------------------------------------------------------------------------
| CONCAT COLLECTION // PUSH TO ARRAY
|--------------------------------------------------------------------------
*/
    public function concat()
    {
        $data = collect(['value1']);
        return $data->concat(['value2']);
        //result =>
        //[
        //  "value1",
        //  "value2"
        //]

        // NOTICE ==> we can't define key for contact value
        //$data = collect(['key1'=>'value1']);
        //return $data->concat(['key2'=>'value2']);

        // WRONG


    }

/*
|--------------------------------------------------------------------------
| CONTAINS & CONTAINS STRICT  COLLECTION
|--------------------------------------------------------------------------
|   NOTICE : IT CAN RETURN BOOLEAN ONLY
*/
    public function contains()
    {
        return collect(['value1'])->contains('value2');
        //result => false

        return collect(['value1'])->contains('value1');
        //result => true

        return collect(['key'=>'value1'])->contains('value1');
        //result => true

         return collect(['key'=>'value1'])->contains('key','value1');
        //result => false

        return collect([
            ['key'=>'value1'],
        ])->contains('key','value1');
        //result => true

        return collect([0,1,2,3,4,5])
            ->contains(function ($value , $key){
               return $value > 6;
            });
        //result =>false

        return collect([0,1,2,3,4,5])
            ->contains(function ($value , $key){
                return $value > 4;
            });
        //result =>true

        return collect([15])
            ->contains('15');
        //result => true

        return collect([15])
            ->containsStrict('15');
        //result => false

        return collect(["0015"])
            ->contains('15');
        //result => true

        return collect(["0015"])
            ->containsStrict('15');
        //result => false

        return collect(["   0015"])
            ->contains(' 15');
        //result => true

        return collect(["   0015"])
            ->containsStrict(' 15');
        //result => false
    }
    /*
|--------------------------------------------------------------------------
| COUNT COLLECTION
|--------------------------------------------------------------------------
*/
    public function count()
    {
        return collect([
            1,
            2 => 2.1,2.2,
            3,
            'sara',
        ])->count();
        //return => 4
    }
    /*
|--------------------------------------------------------------------------
| CROSS JOIN COLLECTION
|--------------------------------------------------------------------------
*/
    public function crossJoin()
    {
        $collections = collect(['benz','ford','Honda']);
        return $collections->crossJoin(
            [2020,2021,2022],
            ['withe','black','blue','green'],
            ['manual','automatic']
        );
        //result => [
        //  "benz",
        //  2020,
        //  "withe",
        //  "manual"
        //  ],
        //  [
        //  "benz",
        //  2020,
        //  "withe",
        //  "automatic"
        //],
        //[
        //"benz",
        //2020,
        //"black",
        //"manual"
        //],
        //[
        //"benz",
        //2020,
        //"black",
        //"automatic"
        //],
        //[
        //"benz",
        //2020,
        //"blue",
        //"manual"
        //],
        //[
        //"benz",
        //2020,
        //"blue",
        //"automatic"
        //],
        //[
        //"benz",
        //2020,
        //"green",
        //"manual"
        //],
        //[
        //"benz",
        //2020,
        //"green",
        //"automatic"
        //],
        //[
        //"benz",
        //2021,
        //"withe",
        //"manual"
        //],
        //[
        //"benz",
        //2021,
        //"withe",
        //"automatic"
        //],
        //[
        //"benz",
        //2021,
        //"black",
        //"manual"
        //],
        //[
        //"benz",
        //2021,
        //"black",
        //"automatic"
        //],
        //[
        //"benz",
        //2021,
        //"blue",
        //"manual"
        //],
        //[
        //"benz",
        //2021,
        //"blue",
        //"automatic"
        //],
        //[
        //"benz",
        //2021,
        //"green",
        //"manual"
        //],
        //[
        //"benz",
        //2021,
        //"green",
        //"automatic"
        //],
        //[
        //"benz",
        //2022,
        //"withe",
        //"manual"
        //],
        //[
        //"benz",
        //2022,
        //"withe",
        //"automatic"
        //],
        //[
        //"benz",
        //2022,
        //"black",
        //"manual"
        //],
        //[
        //"benz",
        //2022,
        //"black",
        //"automatic"
        //],
        //[
        //"benz",
        //2022,
        //"blue",
        //"manual"
        //],
        //[
        //"benz",
        //2022,
        //"blue",
        //"automatic"
        //],
        //[
        //"benz",
        //2022,
        //"green",
        //"manual"
        //],
        //[
        //"benz",
        //2022,
        //"green",
        //"automatic"
        //],
        //[
        //"ford",
        //2020,
        //"withe",
        //"manual"
        //],
        //[
        //"ford",
        //2020,
        //"withe",
        //"automatic"
        //],
        //[
        //"ford",
        //2020,
        //"black",
        //"manual"
        //],
        //[
        //"ford",
        //2020,
        //"black",
        //"automatic"
        //],
        //[
        //"ford",
        //2020,
        //"blue",
        //"manual"
        //],
        //[
        //"ford",
        //2020,
        //"blue",
        //"automatic"
        //],
        //[
        //"ford",
        //2020,
        //"green",
        //"manual"
        //],
        //[
        //"ford",
        //2020,
        //"green",
        //"automatic"
        //],
        //[
        //"ford",
        //2021,
        //"withe",
        //"manual"
        //],
        //[
        //"ford",
        //2021,
        //"withe",
        //"automatic"
        //],
        //[
        //"ford",
        //2021,
        //"black",
        //"manual"
        //],
        //[
        //"ford",
        //2021,
        //"black",
        //"automatic"
        //],
        //[
        //"ford",
        //2021,
        //"blue",
        //"manual"
        //],
        //[
        //"ford",
        //2021,
        //"blue",
        //"automatic"
        //],
        //[
        //"ford",
        //2021,
        //"green",
        //"manual"
        //],
        //[
        //"ford",
        //2021,
        //"green",
        //"automatic"
        //],
        //[
        //"ford",
        //2022,
        //"withe",
        //"manual"
        //],
        //[
        //"ford",
        //2022,
        //"withe",
        //"automatic"
        //],
        //[
        //"ford",
        //2022,
        //"black",
        //"manual"
        //],
        //[
        //"ford",
        //2022,
        //"black",
        //"automatic"
        //],
        //[
        //"ford",
        //2022,
        //"blue",
        //"manual"
        //],
        //[
        //"ford",
        //2022,
        //"blue",
        //"automatic"
        //],
        //[
        //"ford",
        //2022,
        //"green",
        //"manual"
        //],
        //[
        //"ford",
        //2022,
        //"green",
        //"automatic"
        //],
        //[
        //"Honda",
        //2020,
        //"withe",
        //"manual"
        //],
        //[
        //"Honda",
        //2020,
        //"withe",
        //"automatic"
        //],
        //[
        //"Honda",
        //2020,
        //"black",
        //"manual"
        //],
        //[
        //"Honda",
        //2020,
        //"black",
        //"automatic"
        //],
        //[
        //"Honda",
        //2020,
        //"blue",
        //"manual"
        //],
        //[
        //"Honda",
        //2020,
        //"blue",
        //"automatic"
        //],
        //[
        //"Honda",
        //2020,
        //"green",
        //"manual"
        //],
        //[
        //"Honda",
        //2020,
        //"green",
        //"automatic"
        //],
        //[
        //"Honda",
        //2021,
        //"withe",
        //"manual"
        //],
        //[
        //"Honda",
        //2021,
        //"withe",
        //"automatic"
        //],
        //[
        //"Honda",
        //2021,
        //"black",
        //"manual"
        //],
        //[
        //"Honda",
        //2021,
        //"black",
        //"automatic"
        //],
        //[
        //"Honda",
        //2021,
        //"blue",
        //"manual"
        //],
        //[
        //"Honda",
        //2021,
        //"blue",
        //"automatic"
        //],
        //[
        //"Honda",
        //2021,
        //"green",
        //"manual"
        //],
        //[
        //"Honda",
        //2021,
        //"green",
        //"automatic"
        //],
        //[
        //"Honda",
        //2022,
        //"withe",
        //"manual"
        //],
        //[
        //"Honda",
        //2022,
        //"withe",
        //"automatic"
        //],
        //[
        //"Honda",
        //2022,
        //"black",
        //"manual"
        //],
        //[
        //"Honda",
        //2022,
        //"black",
        //"automatic"
        //],
        //[
        //"Honda",
        //2022,
        //"blue",
        //"manual"
        //],
        //[
        //"Honda",
        //2022,
        //"blue",
        //"automatic"
        //],
        //[
        //"Honda",
        //2022,
        //"green",
        //"manual"
        //],
        //[
        //"Honda",
        //2022,
        //"green",
        //"automatic"
        //]
        //]

        return $collections->crossJoin(
            [2020,2021,2022],
            ['withe','black','blue','green'],
            ['manual','automatic']
        )->count();
        //result => 72
    }
/*
|--------------------------------------------------------------------------
| DIFF COLLECTION
|--------------------------------------------------------------------------
| NOTICE : DIFF IS ONLY FOR DIFFERENT BETWEEN VALUES
*/
    public function diff()
    {
        $collections = collect([ 1 , 2 ,3]);
        return $collections->diff([ 2 , 4 , 6]);

        //return => 0=> 1 , 2=> 3
    }
/*
|--------------------------------------------------------------------------
| DIFF ASSOC COLLECTION
|--------------------------------------------------------------------------
| NOTICE : DIFF ASSOC IS  FOR DIFFERENT BETWEEN VALUES AND KEYS
*/
    public function diffAssoc()
    {
        $collections = collect([ 1=>'orange' , 2=>'apple']);
        return $collections->diffAssoc([ 2 => 'apple' , 3=>'banana']);

        //return => 1=> 'orange'

        $collections = collect([ 1=>'orange' , 2=>'apples']);
        return $collections->diffAssoc([ 2 => 'apple' , 3=>'banana']);

        //return => 1=> 'orange' , 2=> 'apples'

        $collections = collect([ 1=>'orange' , 4=>'apple']);
        return $collections->diffAssoc([ 2 => 'apple' , 3=>'banana']);

        //return => 1=> 'orange' , 4=> 'apples'
    }
/*
|--------------------------------------------------------------------------
| DIFF KEYS  COLLECTION
|--------------------------------------------------------------------------
| NOTICE : DIFF KEYS IS ONLY FOR DIFFERENT KEYS
*/
    public function diffKeys()
    {
        $collections = collect([ 1=>'orange' , 2=>'apple']);
        return $collections->diffKeys([ 2 => 'apple' , 3=>'banana']);

        //return => 1=> 'orange'

        $collections = collect([ 1=>'orange' , 2=>'apples']);
        return $collections->diffKeys([ 2 => 'apple' , 3=>'banana']);

        //return => 1=> 'orange'

        $collections = collect([ 1=>'orange' , 4=>'apple']);
        return $collections->diffKeys([ 2 => 'apple' , 3=>'banana']);

        //return => 1=> 'orange' , 4=> 'apple'
    }
/*
|--------------------------------------------------------------------------
| WHERE & WHERE STRICT  COLLECTION
|--------------------------------------------------------------------------
|
*/
    public function where()
    {
        return collect([
           ['product'=>'apple','price'=>'100'],
           ['product'=>'apple','price'=>200],
           ['product'=>'apple','orange'=>300],
           ['product'=>'apple','orange'=>400],
        ])->where('price',100); // we can use integer or string => 100 or '100'

        //result=> product =>apple , price =>100

        return collect([
            ['product'=>'apple','price'=>'100'],
            ['product'=>'apple','price'=>200],
            ['product'=>'apple','orange'=>300],
            ['product'=>'apple','orange'=>400],
        ])->where('price','<=',100); // we can use integer or string => 100 or '100'

        //result=> product =>apple , price =>100

        return collect([
            ['product'=>'apple','price'=>100],
            ['product'=>'apple','price'=>200],
            ['product'=>'apple','orange'=>300],
            ['product'=>'apple','orange'=>400],
        ])->whereStrict('price',100); // we can use same type of value in array => 100

        //result=> product =>apple , price =>100
    }
/*
|--------------------------------------------------------------------------
| WHERE BETWEEN & WHERE NOT BETWEEN  COLLECTION
|--------------------------------------------------------------------------
|
*/
    public function whereBetween()
    {
        return collect([
            ['product'=>'apple','price'=>'100'],
            ['product'=>'apple','price'=>200],
            ['product'=>'orange','price'=>300],
            ['product'=>'orange','price'=>400],
        ])->whereBetween('price',[100,300]);

        //result=>
        // product =>apple , price =>100
        // product =>apple , price =>200
        // product =>orange , price =>300

        return collect([
            ['product'=>'apple','price'=>'100'],
            ['product'=>'apple','price'=>200],
            ['product'=>'orange','price'=>300],
            ['product'=>'orange','price'=>400],
        ])->whereNotBetween('price',[200,400]); // we can use integer or string => 100 or '100'

        //result=> product =>apple , price =>100

    }
    /*
    |--------------------------------------------------------------------------
    | WHERE IN & WHERE IN STRICT  COLLECTION
    |--------------------------------------------------------------------------
    |
    */
    public function whereIn()
    {
        return collect([
            ['product'=>'apple','price'=>'100'],
            ['product'=>'apple','price'=>200],
            ['product'=>'orange','price'=>300],
            ['product'=>'orange','price'=>400],
        ])->whereIn('price',[100,300]);

        //result=>
        // product =>apple , price =>100
        // product =>orange , price =>300

        return collect([
            ['product'=>'apple','price'=>'100'],
            ['product'=>'apple','price'=>200],
            ['product'=>'orange','price'=>300],
            ['product'=>'orange','price'=>400],
        ])->whereInStrict('price',['100',400]); // we can use same type of array value integer

        //result=> product =>apple , price =>100
        //result=> product =>orange , price =>400

    }
    /*
|--------------------------------------------------------------------------
| WHERE NOT IN & WHERE NOT IN STRICT  COLLECTION
|--------------------------------------------------------------------------
|
*/
    public function whereNotIn()
    {
        return collect([
            ['product'=>'apple','price'=>'100'],
            ['product'=>'apple','price'=>200],
            ['product'=>'orange','price'=>300],
            ['product'=>'orange','price'=>400],
        ])->whereNotIn('price',[200,400]);

        //result=>
        // product =>apple , price =>100
        // product =>orange , price =>300

        return collect([
            ['product'=>'apple','price'=>'100'],
            ['product'=>'apple','price'=>'200'],
            ['product'=>'orange','price'=>300],
            ['product'=>'orange','price'=>400],
        ])->whereNotInStrict('price',['100','200']); // we can use same type of array value integer

        //result=> product =>orange , price =>300
        //result=> product =>orange , price =>400

    }
/*
|--------------------------------------------------------------------------
| FILTER  COLLECTION
|--------------------------------------------------------------------------
|
*/
    public function filter()
    {

        return collect([1,2,3,''])->filter(); // '' , false , [] ,
        //return = > 1,2,3

        return collect([1,2,3,4])->filter(function ($value){
            return ($value % 2) == 0;
        });
        //remind
        //return => 2,4

        return collect([1,2,3,4])->filter(function ($value ,$key){
            return $key > 2;
        });
        //return =>4


    }

/*
|--------------------------------------------------------------------------
| PLUCK  COLLECTION
|--------------------------------------------------------------------------
| NOTICE: PLUCK IS ONLY FOR SINGLE VALUE
*/

    public function pluck()
    {
        return collect([
            ['product'=>'apple','price'=>100,'quantity'=>10],
            ['product'=>'apple','price'=>200,'quantity'=>15],
            ['product'=>'orange','price'=>300,'quantity'=>20],
            ['product'=>'orange','price'=>400,'quantity'=>25],
        ])->pluck('product');

        //return
        // apple,
        //apple,
        //orange,
        //orange

        return collect([
            ['product'=>'apple','price'=>100,'quantity'=>10],
            ['product'=>'apple','price'=>200,'quantity'=>15],
            ['product'=>'orange','price'=>300,'quantity'=>20],
            ['product'=>'orange','price'=>400,'quantity'=>25],
        ])->pluck('product','quantity');

        //return
        // 10=>apple,
        // 15=>apple,
        // 20=>orange,
        // 25=>orange



        // *** IF WE ARE GOING TO RETURN MORE VALUE ***
        return collect([
            ['product'=>'apple','price'=>100,'quantity'=>10],
            ['product'=>'apple','price'=>200,'quantity'=>15],
            ['product'=>'orange','price'=>300,'quantity'=>20],
            ['product'=>'orange','price'=>400,'quantity'=>25],
        ])->map(function ($item){
            return collect($item)->only(['product','quantity']);
        });

        //return =>
        //{
        //"product": "apple",
        //"quantity": 10
        //},
        //{
        //"product": "apple",
        //"quantity": 15
        //},
        //{
        //"product": "orange",
        //"quantity": 20
        //},
        //{
        //"product": "orange",
        //"quantity": 25
        //}

        return collect([
            ['product'=>'apple','price'=>100,'quantity'=>10],
            ['product'=>'apple','price'=>200,'quantity'=>15],
            ['product'=>'orange','price'=>300,'quantity'=>20],
            ['product'=>'orange','price'=>400,'quantity'=>25],
        ])->map(function ($item){
            return collect($item)->only(['product','quantity'])->all();
        });


        // WE CAN CHANGE KEY
        return collect([
            ['product'=>'apple','price'=>100,'quantity'=>10],
            ['product'=>'apple','price'=>200,'quantity'=>15],
            ['product'=>'orange','price'=>300,'quantity'=>20],
            ['product'=>'orange','price'=>400,'quantity'=>25],
        ])->mapWithKeys(function ($item){
            return[
                $item['quantity'] => collect($item)->only(['product','quantity'])->all()
            ];

        });

        //return =>
        // 10=>[
        //{
        //"product": "apple",
        //"quantity": 10
        //},
        //]
        //...
    }

    /*
    |--------------------------------------------------------------------------
    | FIRST WHERE  COLLECTION
    |--------------------------------------------------------------------------
    |
    */

    public function firstWhere()
    {
        return collect([
            ['product'=>'apple','price'=>100,'quantity'=>10],
            ['product'=>'apple','price'=>200,'quantity'=>15],
            ['product'=>'orange','price'=>300,'quantity'=>20],
            ['product'=>'orange','price'=>400,'quantity'=>25],
        ])->firstWhere('price',100); // ->firstWhere('price','>=',100);

        //return => 'product'=>'apple','price'=>100,'quantity'=>10

        return collect([
            ['product'=>'apple','price'=>null,'quantity'=>10],
            ['product'=>'apple','price'=>null,'quantity'=>15],
            ['product'=>'orange','price'=>300,'quantity'=>20],
            ['product'=>'orange','price'=>400,'quantity'=>25],
        ])->firstWhere('price'); // ->firstWhere('price',true);

        //return => 'product'=>'orange','price'=>300,'quantity'=>20
    }

/*
|--------------------------------------------------------------------------
| DIE AND DUMP (dd)  COLLECTION
|--------------------------------------------------------------------------
|
*/

    public function dd()
    {
        return collect([1,2,3,4])
            //->dd();
            ->map(function ($item){
                return $item * 3;
            })
            //->dd();
            ->mapWithKeys(function ($item){
                return [$item +10 => $item];
            })
            //->dd();
            ->reverse();

        //return =>
        //"13": 3,
        //"16": 6,
        //"19": 9,
        //"22": 12
    }

/*
|--------------------------------------------------------------------------
| ZIP  COLLECTION
|--------------------------------------------------------------------------
|
*/
    public function zip()
    {
        return collect(['id','name','age','email'])
            ->zip([1,'ehsan',null,'ehsan1372d@gmail.com']);

        //return =>
        //[
        //"id",
        //1
        //],
        //[
        //"name",
        //"ehsan"
        //],
        //[
        //"age",
        //null
        //],
        //[
        //"email",
        //"ehsan1372d@gmail.com"
        //]

        return collect(['id','name','age','email'])
            ->zip([1,'ehsan',null,'ehsan1372d@gmail.com'],[2,'joe',null,'joe@gmail.com']);
        //return =>
        //[
        //"id",
        //1,
        //2
        //],
        //[
        //"name",
        //"ehsan",
        //"joe"
        //],
        //[
        //"age",
        //null,
        //25
        //],
        //[
        //"email",
        //"ehsan1372d@gmail.com",
        //"joe@gmail.com"
        //]
    }

/*
|--------------------------------------------------------------------------
| SORT  COLLECTION
|--------------------------------------------------------------------------
|
*/
    public function sort()
    {
        return collect(['A22','B22','A12','B12'])
            ->sort();
        //return =>
        //A12
        //A22
        //B12
        //B22

        return collect(['A-22','B-22','A12','B12'])
            ->sort();
        //return =>
        //A-122
        //A12
        //B-22
        //B12

        return collect(['A-22','B-22','A12','B12'])
            ->sort(function ($a,$b){
                $code = str_replace('-','',$a);

                return($code < $b) ? -1:1;
            });
        //return =>
        //A-12
        //A22
        //B-12
        //B22

    }

/*
|--------------------------------------------------------------------------
| SORT BY COLLECTION
|--------------------------------------------------------------------------
|
*/
    public function sortBy()
    {
        return collect([
           ['product'=>'apple','price'=>10,'code'=>'A20'],
           ['product'=>'banana','price'=>20,'code'=>'A-10'],
           ['product'=>'cucumber','price'=>30,'code'=>'A30'],
        ])->sortBy('product');
        //result =>
        //{
        //"product": "apple",
        //"price": 10,
        //"code": "A20"
        //},
        //{
        //"product": "banana",
        //"price": 20,
        //"code": "A-10"
        //},
        //{
        //"product": "cucumber",
        //"price": 30,
        //"code": "A30"
        //}


        return collect([
            ['product'=>'apple','price'=>10,'code'=>'A20'],
            ['product'=>'banana','price'=>20,'code'=>'A-10'],
            ['product'=>'cucumber','price'=>30,'code'=>'A30'],
        ])->sortByDesc('price');

        //result =>
        //"0": {
        //"product": "apple",
        //"price": 10,
        //"code": "A20"
        //},
        //"1": {
        //"product": "banana",
        //"price": 20,
        //"code": "A-10"
        //},
        //"2": {
        //"product": "cucumber",
        //"price": 30,
        //"code": "A30"
        //}

        return collect([
            ['product'=>'apple','price'=>10,'code'=>'A20'],
            ['product'=>'banana','price'=>20,'code'=>'A-10'],
            ['product'=>'cucumber','price'=>30,'code'=>'A30'],
        ])->sortBy(function ( $item ){
            return str_replace('-','',$item['code']);
        });

    }

/*
|--------------------------------------------------------------------------
| GROUP BY COLLECTION
|--------------------------------------------------------------------------
|
*/
    public function groupBy()
    {
        return collect([
            ['product'=>'apple','price'=>10],
            ['product'=>'apple','price'=>20],
            ['product'=>'banana','price'=>20],
            ['product'=>'banana','price'=>30],
        ])->groupBy('product');
        //result =>

        //  "apple":
        // [
        //     {
        //      "product": "apple",
        //      "price": 10
        //      },
        //      {
        //      "product": "apple",
        //      "price": 20
        //      }
        //  ],

        //  "banana":
        // [
        //  {
        //      "product": "banana",
        //      "price": 20
        //  },
        //  {
        //       "product": "banana",
        //        "price": 30
        //  }
        // ]


        return collect([
            'string1'=>['product'=>'apple','price'=>10],
            'string2'=>['product'=>'apple','price'=>20],
            'string3'=>['product'=>'banana','price'=>20],
            'string4'=>['product'=>'banana','price'=>30],
        ])->groupBy('product',true);

        //result =>
        //"apple": {
        //"string1": {
        //"product": "apple",
        //"price": 10
        //},
        //"string2": {
        //    "product": "apple",
        //"price": 20
        //}
        //},
        //"banana": {
        //    "string3": {
        //        "product": "banana",
        //"price": 20
        //},
        //"string4": {
        //        "product": "banana",
        //"price": 30
        //}
        //}

        return collect([
            ['product'=>'apple','code'=>'123AB'],
            ['product'=>'apple','code'=>'123-AB'],
            ['product'=>'apple','code'=>'123 AB'],
        ])->groupBy(function ($element){
            return str_replace(['-',' '],'',$element['code']);
        });
        //result =>
        //   "123AB": [
        //{
        //      "product": "apple",
        //       "code": "123AB"
        //},
        //{
        //       "product": "apple",
        //       "code": "123-AB"
        //},
        //{
        //       "product": "apple",
        //        "code": "123 AB"
        //}
        //]

    }

/*
|--------------------------------------------------------------------------
| FIRST  COLLECTION
|--------------------------------------------------------------------------
| NOTICE : FIRST RETURN ONLY STRING NOT COLLECTION
*/
    public function first()
    {
        return collect([1,2,3,4])->first();
        //return => 1

        return collect([1,2,3,4])->first(function ($element){
            return $element >1;
        });
        //return => 2

        //set default if array is empty
        return collect([])->first(null,1);
        //return => 1

        return collect([1,2])->first(function ($element){
            return $element >2;
        },100);
        //return => 100

        return collect([1,2])->first(function ($element){
            return $element >1;
        },100);
        //return => 2
    }

/*
|--------------------------------------------------------------------------
| GROUP BY COLLECTION
|--------------------------------------------------------------------------
|NOTICE : LAST RETURN ONLY STRING NOT COLLECTION
*/
    public function last()
    {
        return collect([1,2,3,4])->last();
        //return => 4

        return collect([1,2,3,4])->last(function ($element){
            return $element  < 2;
        });
        //return => 1

        //set default if array is empty
        return collect([])->last(null,1);
        //return => 1

        return collect([1,2])->first(function ($element){
            return $element <1;
        },100);
        //return => 100

        return collect([1,2])->first(function ($element){
            return $element <2;
        },100);
        //return => 1
    }

/*
|--------------------------------------------------------------------------
| IS EMPTY & IS NOT EMPTY  COLLECTION
|--------------------------------------------------------------------------
| NOTICE : CHECKING ARRAYS
*/

    public function isEmpty()
    {
        return collect([1,2,'hi'])->isEmpty();
        //return =>false

        return collect([''])->isEmpty();
        //return =>false

        return collect([false])->isEmpty();
        //return =>false

        return collect([])->isEmpty();
        //return =>true

        return collect([1,2,'hi'])->isNotEmpty();
        //return =>true

        $data = collect([1,2,3]);

        if ($data->isNotEmpty()){
            return 'have values!!';
        }

        if (! $data->isEmpty()){
            return 'have values!!';
        }


    }

/*
|--------------------------------------------------------------------------
| REVERSE COLLECTION
|--------------------------------------------------------------------------
|
*/
    public function reverse()
    {
        return collect([1,2,3,4])->reverse();

        //return =>
        //3=>4,
        //2=>3,
        //1=>2,
        //0=>1

        return collect([1,2,3,4])->reverse()->values();

        //return =>
        //0=>4,
        //1=>3,
        //2=>2,
        //3=>1

        return collect([
            'key1'=>'string1',
            'key2'=>'string2',
            'key3'=>'string3',
        ])->reverse();

        //return =>
        //key3=>string3,
        //key2=>string2,
        //key1=>string1,

        return collect([
            'key1'=>'string1',
            'key2'=>'string2',
            'key3'=>'string3',
        ])->reverse()->values();

        //return =>
        //0=>string3,
        //1=>string2,
        //2=>string1,
    }

/*
|--------------------------------------------------------------------------
| TAKE COLLECTION
|--------------------------------------------------------------------------
|   NOTICE : TAKE RETURN ARRAY
*/

    public function take()
    {
        return collect([1,2,3,4])->take(2);
        //return=>
        // 0=>1,
        // 1=>2

        return collect([1,2,3,4])->take(-2);
        //return=>
        // 2=>3,
        // 3=>4
    }

/*
|--------------------------------------------------------------------------
| NTH COLLECTION
|--------------------------------------------------------------------------
|   NOTICE : STEP
*/
    public function nth()
    {
        return collect([1,2,3,4])->nth(2);
        //return
        //0=>1,
        //2=>3,

        //ODD
        return collect([1,2,3,4,5,6,7,8])->nth(2);
        //return
        //0=>1,
        //2=>3,
        //4=>5,
        //6=>7,

        //EVEN
        return collect([1,2,3,4,5,6,7,8])->nth(2,1);
        //return
        //1=>2,
        //3=>4,
        //5=>6,
        //7=>8,
    }

    /*
|--------------------------------------------------------------------------
| ONLY COLLECTION
|--------------------------------------------------------------------------
|   NOTICE : FILTER RETURN DATA's
*/

    public function only()
    {
        //only($keys)
        return collect([1,2,3,4])->only([0,2]);
        //return =>
        //0=>1,
        //2=>3


        return collect(['product'=>'apple','price'=>25,'quantity'=>70])->only('product','price');
        //return =>
        //[
        //'product'=>'apple',
        //'price'=>25,
        //]

        $keys = collect(['product','price']);
        return collect(['product'=>'apple','price'=>25,'quantity'=>70])->only($keys);
        //return =>
        //[
        //'product'=>'apple',
        //'price'=>25,
        //]

        return collect(['product'=>'apple','price'=>25,'quantity'=>70])->only(null);
        //return =>
        //[
        //'product'=>'apple',
        //'price'=>25,
        //'quantity'=>70
        //]


    }


/*
|--------------------------------------------------------------------------
| EACH & EACH SPREAD COLLECTION
|--------------------------------------------------------------------------
|   NOTICE : LOOPING
*/
    public function each()
    {
        return collect([1,2,3,4])
            ->each(function ($value){
               dump("the number is {$value}");
            });

        //return =>
        //"the number is 1"
        //"the number is 2"
        //"the number is 3"
        //"the number is 4"


        return collect([1,2,3,4])
            ->each(function ($value){
                if($value >2){
                    return false;
                }
                dump("the number is {$value}");
            });

        //return =>
        //"the number is 1"
        //"the number is 2"

        return collect([
            ['apple',45,'Iran'],
            ['orange',45,'Canada'],
            ['cucumber',45,'England'],
        ])
            ->each(function ($value){
                dump("There are {$value[1]} {$value[0]} in {$value[2]}");
            });

        //return =>
        //"There are 45 apple in Iran"
        //"There are 45 orange in Canada"
        //"There are 45 cucumber in England"

        return collect([
            ['apple',45,'Iran'],
            ['orange',45,'Canada'],
            ['cucumber',45,'England'],
        ])
            ->eachSpread(function ($product,$quantity,$location){
                dump("There are {$quantity} {$product} in {$location}");
            });
        //return =>
        //"There are 45 apple in Iran"
        //"There are 45 orange in Canada"
        //"There are 45 cucumber in England"
    }

    /*
|--------------------------------------------------------------------------
|   TIMES COLLECTION
|--------------------------------------------------------------------------
|   NOTICE : REPEATING
*/

    public function times()
    {
        return \Illuminate\Support\Collection::times(3,function ($value){
            return 1;
        });

        //return =>
        //1
        //1
        //1

        return \Illuminate\Support\Collection::times(3,function ($value){
            return \App\Models\User::factory()->make([
                'name' => "{$value} name",
            ]);
        })->toArray();
    }
    //return =>
    //[
    //{
    //"name": "1 name",
    //"email": "egislason@example.com",
    //"email_verified_at": "2021-10-08T13:31:35.000000Z"
    //},
    //{
    //"name": "2 name",
    //"email": "mollie.mante@example.net",
    //"email_verified_at": "2021-10-08T13:31:35.000000Z"
    //},
    //{
    //"name": "3 name",
    //"email": "axel36@example.net",
    //"email_verified_at": "2021-10-08T13:31:35.000000Z"
    //}
    //]

    /*
|--------------------------------------------------------------------------
|   TO ARRAY COLLECTION
|--------------------------------------------------------------------------
|
*/

    public function toArray()
    {
        return collect([1,2,3,4])->all();

        return collect([1,2,3,4])->toArray();

        return collect([
            collect([1,2,3,4]),
            collect([1,2,3,4]),
        ])->toArray();
    }

    /*
|--------------------------------------------------------------------------
|   TO JSON COLLECTION
|--------------------------------------------------------------------------
|
*/
    public function toJson()
    {
        return collect(['product'=>'cucumber','price'=>45,'location'=>'London'])
            ->toJson();
        //return =>
        //{"product":"cucumber","price":45,"location":"London"}


        //WE CAN VISIT PHP SITE TO OPTIONS OF JSON_ENCODE
        return collect(['product'=>'cucumber','price'=>45,'location'=>'London'])
            ->toJson(JSON_PRETTY_PRINT);
    }
}


