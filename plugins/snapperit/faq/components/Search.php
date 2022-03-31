<?php namespace Snapperit\Faq\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\DB;
use Input, Validator, Redirect;
use Illuminate\Pagination\Paginator;
use Snapperit\Faq\Models\Faq;

class Search extends ComponentBase
{
    // type = 1 -> String Search
    // type = 2 -> Regex Search
    protected $SearchType = 2;

    public function componentDetails()
    {
        return [
            'name' => "Search FAQ's ",
            'description' => 'Simple Database searcher',
        ];
    }

    public function getAll()
    {
        $results = Faq::all();
        return $results;
    }

    public function onSend()
    {
//        ddd('test');
        $keyword = Input::get('keyword');
        $searchString = $this->trimDoubleSpaces($keyword);

        if ($searchString == '') {
            $this->page['records'] = Faq::all();
            return 0;
        }
        $this->ExecSearchType($searchString);
    }

    private function ExecSearchType($searchString)
    {
        if ($this->SearchType == 1)
            $records = $this->stringSearch($searchString);
        else
            $records = $this->keyWordSearch($searchString);

        $this->page['records'] = $records;
    }


    private function generateRegExp($string)
    {
        return str_replace(" ", "|", $string);
    }

    private function trimDoubleSpaces($string)
    {
        $string = preg_replace('/\s\s+/i', ' ', $string);
        return (trim($string));
    }

    private function keyWordSearch($searchString)
    {
        $regexp = $this->generateRegExp($searchString);
        $records = Faq::where('question', 'REGEXP', $regexp)
            ->orWhere('answer', 'REGEXP', $regexp)
            ->get();
        $records = $records->sortByDesc(function ($record) use (&$regexp){
            return (preg_match_all("/".$regexp."/", $record->question) + preg_match_all("/".$regexp."/", $record->answer));
        });
        return $records;
    }

    private function stringSearch($query)
    {
        return Faq::where('question', 'LIKE', '%' . $query . '%')
            ->orWhere('answer', 'LIKE', '%' . $query . '%')
            ->get();
    }


}
