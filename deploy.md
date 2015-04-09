# Deploying the website

The website is contained in the `site` folder of the project. It is nearly ready for deployment.
There is just a little bit of configuration that needs to be done.

## site/application/config/config.php

    $config['base_url'] = '';

Set this to the base URL of your website. For development this will probably be something on localhost.

    $config['language']	= 'english';

Set this to the correct default language for your website.

    $config['sess_save_path'] = NULL;

Set this to a valid database name to store the session information.

## site/application/config/database.php

Set the necessary configuration for your database.
