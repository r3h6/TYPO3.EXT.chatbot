## Tests

```
typo3DatabaseName="scotchbox" \
typo3DatabaseUsername="root" \
typo3DatabasePassword="root" \
typo3DatabaseHost="localhost" \
TYPO3_PATH_WEB=$PWD/.Build/web \
\
.Build/bin/phpunit --colors -c \
  .Build/vendor/typo3/testing-framework/Resources/Core/Build/FunctionalTests.xml \
  Tests/Functional/
```

```
TYPO3_PATH_WEB=$PWD/.Build/web \
\
.Build/bin/phpunit --colors -c \
  .Build/vendor/typo3/testing-framework/Resources/Core/Build/UnitTests.xml \
  Tests/Unit/
```