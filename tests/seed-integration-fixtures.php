<?php declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use Relewise\Factory\UserFactory;
use Relewise\Models\ApplyFilterSettings;
use Relewise\Models\CategoryNameAndId;
use Relewise\Models\CategoryPath;
use Relewise\Models\CategoryScope;
use Relewise\Models\CategoryUpdateUpdateKind;
use Relewise\Models\Currency;
use Relewise\Models\FilterCollection;
use Relewise\Models\FilterScopes;
use Relewise\Models\FilterSettings;
use Relewise\Models\Language;
use Relewise\Models\Multilingual;
use Relewise\Models\MultilingualValue;
use Relewise\Models\Product;
use Relewise\Models\ProductCategory;
use Relewise\Models\ProductCategoryIdFilter;
use Relewise\Models\ProductCategoryUpdate;
use Relewise\Models\ProductRecentlyViewedByUserFilter;
use Relewise\Models\ProductSearchRequest;
use Relewise\Models\ProductUpdate;
use Relewise\Models\ProductUpdateUpdateKind;
use Relewise\Models\ProductView;
use Relewise\Models\TrackProductCategoryUpdateRequest;
use Relewise\Models\TrackProductUpdateRequest;
use Relewise\Models\TrackProductViewRequest;
use Relewise\Searcher;
use Relewise\Tests\DotEnv;
use Relewise\Tracker;

DotEnv::load();
$datasetId = getenv('DATASET_ID');
$apiKey = getenv('API_KEY');
if ($datasetId === false || trim($datasetId) === '' || $apiKey === false || trim($apiKey) === '') {
    throw new RuntimeException('DATASET_ID and API_KEY must be configured.');
}

$tracker = new Tracker($datasetId, $apiKey, 30);
$searcher = new Searcher($datasetId, $apiKey, 30);
$tracker->serverUrl = $searcher->serverUrl = rtrim(getenv('SERVER_URL') ?: 'https://api.relewise.com', '/');
$productId = 'php-sdk-search-product';
$categoryId = 'php-sdk-search-category';
$user = UserFactory::byTemporaryId('php-sdk-search-user');
$categoryName = Multilingual::create(
    MultilingualValue::create(Language::create('en-US'), 'SDK search category'),
    MultilingualValue::create(Language::create('da-dk'), 'SDK search category')
);

$tracker->trackProductCategoryUpdate(TrackProductCategoryUpdateRequest::create(
    ProductCategoryUpdate::create(
        ProductCategory::create($categoryId)->setDisplayName($categoryName),
        CategoryUpdateUpdateKind::ReplaceProvidedProperties
    )
));
$tracker->trackProductUpdate(TrackProductUpdateRequest::create(
    ProductUpdate::create(
        Product::create($productId)
            ->setDisplayName(Multilingual::create(
                MultilingualValue::create(Language::create('en-US'), 'SDK highlighted product'),
                MultilingualValue::create(Language::create('da-dk'), 'SDK highlighted product')
            ))
            ->setCategoryPaths(CategoryPath::create(CategoryNameAndId::create($categoryId, $categoryName))),
        [],
        ProductUpdateUpdateKind::ReplaceProvidedProperties
    )
));
$tracker->trackProductView(TrackProductViewRequest::create(ProductView::create($user, Product::create($productId))));

// Public search is polled only during seeding to allow the initial indexing and view to become visible.
$deadline = microtime(true) + 300;
do {
    $ready = true;
    foreach (['en-US' => 'USD', 'da-dk' => 'DKK'] as $language => $currency) {
        foreach ([
            ProductCategoryIdFilter::create(CategoryScope::Ancestor)->setCategoryIds($categoryId),
            ProductRecentlyViewedByUserFilter::create(new DateTime('-1 hour'))
                ->setSettings(FilterSettings::create()->setScopes(
                    FilterScopes::create()->setDefault(ApplyFilterSettings::create(true))
                ))
        ] as $filter) {
            $response = $searcher->productSearch(ProductSearchRequest::create(
                Language::create($language), Currency::create($currency), $user,
                'integration test seed', null, 0, 20
            )->setFilters(FilterCollection::create($filter)));
            if (count($response->results) !== 1 || $response->results[0]->productId !== $productId) {
                $ready = false;
            }
        }
    }
    if ($ready) {
        echo "Persistent integration fixtures are ready.\n";
        exit(0);
    }
    usleep(500000);
} while (microtime(true) < $deadline);

throw new RuntimeException('Persistent integration fixtures did not become searchable within five minutes.');
