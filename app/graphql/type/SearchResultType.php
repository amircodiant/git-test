<?php
namespace app\graphql\type;

use app\graphql\data\Story;
use app\graphql\data\User;
use app\graphql\Types;
use GraphQL\Type\Definition\UnionType;

class SearchResultType extends UnionType
{
    public function __construct()
    {
        $config = [
            'name' => 'SearchResultType',
            'types' => function() {
                return [
                    Types::story(),
                    Types::user()
                ];
            },
            'resolveType' => function($value) {
                if ($value instanceof Story) {
                    return Types::story();
                } else if ($value instanceof User) {
                    return Types::user();
                }
            }
        ];
        parent::__construct($config);
    }
}
