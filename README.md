# codeigniter2-heroku

This is a template project for deploying codeigniter 2.x to heroku in just a few steps.

Before start, make sure that you have [git](http://git-scm.com/book/en/v2/Getting-Started-Installing-Git), [composer](https://getcomposer.org/), [Heroku Toolbelt](https://toolbelt.heroku.com/) 
and of course php and apache installed on your system.
For more information visit the the oficial docs at: https://devcenter.heroku.com/articles/getting-started-with-php
follow the [Introduction](https://devcenter.heroku.com/articles/getting-started-with-php#introduction) and [Set up](https://devcenter.heroku.com/articles/getting-started-with-php#set-up) sections

# Deploy codeigniter 2.x to heroku
* Clone this project:
  
```
$ git clone https://github.com/carloscarcamo/codeigniter2-heroku.git && cd codeigniter2-heroku
```

* Create your app on heroku:

```
$ heroku create <app-name>
```

* Now deploy your code:

```
 $ git push heroku master
```

* Make sure your app is running 

```
$ heroku ps:scale web=1
```

* Lastly open your website:

```
$ heroku open
```

That's all! you should have a running app on heroku :)

__Note:__ I've removed the __user_guide__ folder from the original Codeigniter package, but if you need it you can find it on the original repo: https://github.com/bcit-ci/CodeIgniter/tree/2.2-stable 
