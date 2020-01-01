#### Installation

NOTE: You have to register the blade component for 
general::header and general::footer or the template will break.

NOTE: You have to add command to commands variable in app/console/Kernel.php
```
EmailUserActivateCommand::class
```

NOTE: You have to schedule the cronjob in schedule method
```
$schedule->command('email:user:activate')->everyMinute();
```
