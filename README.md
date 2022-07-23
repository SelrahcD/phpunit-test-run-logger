# PHPUnit test run logger

This is a test run logger.

After each test run it logs if the run was passing or failing.

This is useful during a Dojo session, where you want to practice and reflect on the way you've used TDD during a code kata.

## Install

1. Install with composer `composer require selrahcd/phpunit-test-run-logger`

2. Configure PHPUnit to use the extensions, in `phpunit.xml` add
```xml
    <extensions>
        <extension class="Selrahcd\PhpunitTestRunLogger\TestRunLogger">
        </extension>
    </extensions>
```