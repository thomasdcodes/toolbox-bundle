## User based features

### Changes in your user class
First, you have to implement the [Tdc\ToolboxBundle\ContractsToolboxUserInterface](../src/Contracts/ToolboxUserInterface.php) in your user entity.

### Changes in config
Second, you have to bind the Interface to the user class to the config.

```
# config/packages/doctrine.yaml
doctrine:
  orm:
    resolve_target_entities:
      Tdc\ToolboxBundle\ContractsToolboxUserInterface: App\Entity\User
``` 