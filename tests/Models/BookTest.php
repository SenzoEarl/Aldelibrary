<?php
namespace Tests\Models;

use App\Models\Book;
use PDO;
use PDOStatement;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public function testGetAllWithRelationsWithoutSearch(): void
    {
        $mockDb = $this->createMock(PDO::class);
        $mockStmt = $this->createMock(PDOStatement::class);

        // Expected output from fetchAll
        $expectedResult = [
            [
                'book_id' => 1,
                'book_name' => 'The Great Gatsby',
                'price' => '10.99',
                'author_name' => 'F. Scott Fitzgerald',
                'language_name' => 'English',
                'genre_name' => 'Tragedy',
                'publisher_name' => 'Scribner',
                'country_name' => 'USA'
            ]
        ];

        // Setting up expectations for query() and fetchAll()
        $mockStmt->expects($this->once())
            ->method('fetchAll')
            ->with(PDO::FETCH_ASSOC)
            ->willReturn($expectedResult);

        $mockDb->expects($this->once())
            ->method('query')
            ->with($this->callback(function ($sql) {
                // Ensure SQL doesn't have WHERE clause when no search is provided
                return strpos($sql, 'WHERE') === false;
            }))
            ->willReturn($mockStmt);

        $book = new Book($mockDb);
        $result = $book->getAllWithRelations();

        $this->assertEquals($expectedResult, $result);
    }

    public function testGetAllWithRelationsWithSearch(): void
    {
        $mockDb = $this->createMock(PDO::class);
        $mockStmt = $this->createMock(PDOStatement::class);

        $searchKeyword = 'Gatsby';
        $searchParam = '%' . $searchKeyword . '%';

        $expectedResult = [
            [
                'book_id' => 1,
                'book_name' => 'The Great Gatsby',
                'price' => '10.99',
                'author_name' => 'F. Scott Fitzgerald',
                'language_name' => 'English',
                'genre_name' => 'Tragedy',
                'publisher_name' => 'Scribner',
                'country_name' => 'USA'
            ]
        ];

        // Ensure execute is called with the correctly formatted parameters
        $mockStmt->expects($this->once())
            ->method('execute')
            ->with([
                's1' => $searchParam,
                's2' => $searchParam,
                's3' => $searchParam
            ])
            ->willReturn(true);

        $mockStmt->expects($this->once())
            ->method('fetchAll')
            ->with(PDO::FETCH_ASSOC)
            ->willReturn($expectedResult);

        $mockDb->expects($this->once())
            ->method('prepare')
            ->with($this->callback(function ($sql) {
                // Ensure SQL does have WHERE clause and uses named parameters
                return strpos($sql, 'WHERE b.name LIKE :s1 OR a.name LIKE :s2 OR g.name LIKE :s3') !== false;
            }))
            ->willReturn($mockStmt);

        $book = new Book($mockDb);
        $result = $book->getAllWithRelations($searchKeyword);

        $this->assertEquals($expectedResult, $result);
    }
}
