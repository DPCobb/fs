<?php
/*
 * PROJECT: Formstack Assessment
 * AUTHOR: Daniel Cobb
 * CREATED: 11/2016
 */

abstract class View
{
    public $title;

    /**
     * sets the page title
     * @param string $title sets the page title
     */
    public function __construct($title)
    {
        $this->title = $title;
    }


    /**
     * createHeader builds the html header
     * @return null
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
            <link href="./public/css/normalize.css" rel="stylesheet" type="text/css"/>
            <link href="./public/css/skeleton.css" rel="stylesheet" type="text/css"/>
            <link href="./public/css/main.css" rel="stylesheet" type="text/css"/>
        </head>
        <body>
        <main>
        <h1>Formstack Assessment</h1>
        ';
    }

    /**
     * createFooter builds the html for the footer
     * @return null
     */
     public function createFooter()
     {
         echo'
         </main>
         </body>
         </html>
         ';
     }

     /**
      * buildDisplay builds out the view
      * @return null
      */
     public function buildDisplay()
     {
         $all = $this->createHeader() . $this->createFooter();
         echo $all;
     }
}
