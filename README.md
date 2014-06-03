Datatable Enhanced : PHP wrapper
================================

Allows to manage [Datatable Enhanced](https://github.com/SneakyBobito/jquery.datatable.enhanced-control) 
directly from PHP :  it saves a lot of time and will make your datatable application much more consistance and easy to maintain.

Note : Project under beta testing, feel free to repport any bug

Installation
============

It is available on packagist : ``"sneakybobito/dt-enhanced" : "dev-master"``

You will have to install the client side library too : https://github.com/SneakyBobito/jquery.datatable.enhanced-control

Basic Usage
===========

Here is a simple, but verbose example that only aims to show basical stuff.
Obviously it will work with any framework.

For the example we use basical instaciation.
We hightly recomend to use preset or inheritance instead.


**userlist.php**
```php

  <?php
  
  // config is the list of the columns and the datatable config
  $dtConf = new \DtEnhanced\Config();
  
  // url for datatable serverside processing
  $dtConf->setUrl("/users-list.php");
  
  // declare firstname column
  \DtEnhanced::column()
    ->setName("firstname")
    ->setSqlName("user.firstname")
    ->addTo($dtConf);
    
  // declare lastname column
  \DtEnhanced::column()
    ->setName("lastname")
    ->setSqlName("user.lastname")
    ->addTo($dtConf);
    
  // declare id column
  \DtEnhanced::column()
    ->setName("id")
    ->setSqlName("user.id")
    ->addTo($dtConf);
    
  if($_GET["draw"] == 1){
  
    $request  = new \DtEnhanced\Request($_GET,$dtConf);
    $response = new \DtEnhanced\Response();
    
    // for the example let's use good old mysql function
    // but it mays works with any library
    $sqlQuery = "select * from user ORDER BY " . $request->getSqlOrder() 
       . " LIMIT " . $request->getLimit() 
       . " OFFSET " . $request->getOffset();

     $users = mysql_query($sqlQuery);
     
     while($r = mysql_fetch_assoc($users)){
        $response->addItem($r);
     }
     
     $sqlQuery = "select count(*) as nb from user";
     $export->setTotal(mysql_fetch_assoc( mysql_query($sqlQuery) )["nb"]);
     
     echo $export;
    
  }else{

    include "template.html";
  
  }
  
```

**template.html**
```php

<html>

  <head>
  
    <!-- include jquery / datatable / datatable-enhanced -->
  
  </head>

  <body>

    <div id="table"></div>
    
    <script>
    
      $(function(){
  
        var dt = new dtEnhanced.Servertable(
            dtEnhanced.creationHelper(
                '<?=OrderConf.renderConfig() ?>',
                {},
                '<?=OrderConf.renderColumns() ?>',
                {}
            )
        );
        
        dt.show("#table");
  
      });

    
    </script>

  </body>

</html>

```


