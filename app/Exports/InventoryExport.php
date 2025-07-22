namespace App\Exports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\FromCollection;

class InventoryExport implements FromCollection
{
    public function collection()
    {
        return Inventory::all(['product_name', 'location', 'quantity', 'status']);
    }
}
