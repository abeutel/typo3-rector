<?php

declare(strict_types=1);

namespace Ssch\TYPO3Rector\Rector\v9\v0;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use Rector\Core\Rector\AbstractRector;
use Rector\Core\RectorDefinition\CodeSample;
use Rector\Core\RectorDefinition\RectorDefinition;
use TYPO3\CMS\SysNote\Domain\Repository\SysNoteRepository;

/**
 * @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/9.0/Breaking-82506-RemoveBackendUserRepositoryInjectionInNoteController.html
 */
final class FindByPidsAndAuthorIdRector extends AbstractRector
{
    /**
     * @return string[]
     */
    public function getNodeTypes(): array
    {
        return [MethodCall::class];
    }

    /**
     * @param MethodCall $node
     */
    public function refactor(Node $node): ?Node
    {
        if (! $this->isMethodStaticCallOrClassMethodObjectType($node, SysNoteRepository::class)) {
            return null;
        }
        if (! $this->isName($node->name, 'findByPidsAndAuthor')) {
            return null;
        }
        if (count($node->args) < 2) {
            return null;
        }
        $node->name = new Identifier('findByPidsAndAuthorId');
        $secondArgument = $node->args[1];
        $secondArgument->value = $this->createMethodCall($secondArgument->value, 'getUid');
        return $node;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDefinition(): RectorDefinition
    {
        return new RectorDefinition('Use findByPidsAndAuthorId instead of findByPidsAndAuthor', [new CodeSample(<<<'PHP'
$sysNoteRepository = GeneralUtility::makeInstance(SysNoteRepository::class);
$backendUser = new BackendUser();
$sysNoteRepository->findByPidsAndAuthor('1,2,3', $backendUser);
PHP
, <<<'PHP'
$sysNoteRepository = GeneralUtility::makeInstance(SysNoteRepository::class);
$backendUser = new BackendUser();
$sysNoteRepository->findByPidsAndAuthorId('1,2,3', $backendUser->getUid());
PHP
)]);
    }
}
