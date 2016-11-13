# Formstack Assessment
#### Daniel Cobb
#### 11/2016

### Basic Info
The project is set up with a simple GUI for CRUD functionality. Add/Update user links bring up forms to complete the action, Delete link removes entry from DB, and View link views a single DB entry. To use the application just go to index.php and select desired actions.

## Basic Project Structure
This project is built around the MainController which acts as a router for index.php. MainController looks for the url parameter 'p' to decide which view to call through models/Views.Class.php. Essentially, MainController sends a folder/file string to models/Views.Class.php (ex: index/index, create/index ) which then includes that view file into index.php.

From there, the view file (ex: views/index/index.php) requires the needed class, passes the page title and builds the view. For index/index, the IndexView.Class.php file is required, instantiated, and method buildDisplay is called. IndexView is a subclass of View which builds the view and instantiates the needed controller.

Each function of CRUD has its own controller which is called for each view. The controller interacts with the matching model file and the HtmlController to retrieve and parse data, format HTML output, and return formatted HTML back to the view for display. The basic flow of this application would look like:

MainController->View->Controller->Model->Controller/HtmlController->View

I decided to place the bulk of the HTML into a controller for easier editing and to keep the controllers a little less cluttered.

## PHPUnit
PHPUnit was the biggest struggle for me. This was the first time I have used the application and actually had to try a few different ways to install it before I got a fully functioning application with code coverage working. Unfortunately, I didn't have enough time to really dive into the Documentation to get the DB testing working, two unanticipated 55+hr work weeks severely limited the time I had available. This is definitely a major setback with this project, but after looking through the Documentation and starting to work with PHPUnit I feel like it is a valuable tool that I am going to continue to learn. 
