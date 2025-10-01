<?php

declare(strict_types=1);

namespace Tdc\ToolboxBundle\Service;

use Symfony\Contracts\Cache\CacheInterface;

readonly final class VersionService
{
    public function __construct(
        private CacheInterface $cache,
        private string $projectDir,
    )
    {
    }

    public function getVersion(): string
    {
        $composerFilePath = $this->projectDir . '/composer.json';

        if (!file_exists($composerFilePath)) {
            throw new \Exception('composer.json not found. Looked into ' . $this->projectDir);
        }

        $composerData = $this->cache->get('tdc.toolbox.version', function () use ($composerFilePath) {
            return json_decode(file_get_contents($composerFilePath), true);
        });

        return $composerData['version'] ?? 'Version nicht gefunden';
    }

    public function getChangelog(): string
    {
        $changelogFilePath =  $this->projectDir . '/changelog.md';

        if (!file_exists($changelogFilePath)) {
            throw new \Exception('changelog.md not found. Looked into ' . $this->projectDir);
        }

        return $this->cache->get('tdc.toolbox.changelog', function () use ($changelogFilePath) {
            return file_get_contents($changelogFilePath);
        });
    }
}