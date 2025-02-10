namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\Auth;

class Query
{
    public function publicData()
    {
        return "This is public data.";
    }

    public function privateData()
    {
        if (Auth::check()) {
            return "This is private data for authenticated users.";
        }

        throw new \Exception("Unauthorized", 401);
    }
}
