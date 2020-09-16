<?php

namespace Monorepo\Composer;

use Composer\Installer\InstallationManager;
use Composer\Package\PackageInterface;
use Composer\Package\RootPackageInterface;

class AutoloadGenerator extends \Composer\Autoload\AutoloadGenerator
{
    public function buildPackageMap(InstallationManager $installationManager, PackageInterface $mainPackage, array $packages)
    {
        $packageMap = parent::buildPackageMap($installationManager, $mainPackage, $packages);

        $packageMap[0][1] = $installationManager->getInstallPath($mainPackage); // hack the install path

        return $packageMap;
    }

    protected function filterPackageMap(array $packageMap, PackageInterface $mainPackage)
    {
        return $packageMap;
    }
}
