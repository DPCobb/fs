<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

class View
{
    public $title;

    function __construct($title)
    {
        $this->title = $title;
    }


    /*
     * createHeader - Function
     * createHeader creates the html header
     */
    public function createHeader()
    {
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>'.$this->title.'</title>
            <link href="./public/css/main.css" rel="stylesheet" type="text/css"/>
        </head>
        <body>
        <main>
        ';
    }

    /*
     * createFooter - Function
     * createFooter creates the footer portion of the html
     */
     public function createFooter()
     {
         echo'
         </main>
         </body>
         </html>
         ';
     }

     /*
      * buildDisplay - Function
      * buildDisplay constructs and displays the view
      * This function is polymorphic and will change with different views
      */

     public function buildDisplay()
     {
         $all = $this->createHeader() . $this->createFooter();
         echo $all;
     }
}

?>