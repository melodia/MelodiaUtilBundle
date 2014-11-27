#MelodiaUtilBundle

##Installation

Step 1: Download the Bundle
---------------------------

```json
// composer.json
repositories: [
  {
    "type": "vcs",
    "url": "https://github.com/melodia/MelodiaUtilBundle.git"
  }
]
```

```bash
$ composer require "melodia/util-bundle" "dev-master"
```

Step 2: Enable the Bundle
-------------------------

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new Melodia\UtilBundle\MelodiaUtilBundle(),
        );

        // ...
    }

    // ...
}
```

