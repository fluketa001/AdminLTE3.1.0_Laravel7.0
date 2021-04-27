<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use Redirect;
use Auth;
use File;
use App\Resident;
use App\Room;
use App\Rent;
use App\ListDelete;
use App\Point;

class RentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rents = Rent::orderby('updated_at','desc')->get();
        return view('admin.rent.index')->with('data',$rents);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $residents = Resident::leftJoin('rooms', 'residents.rooms_id', '=', 'rooms.id')
            ->select('*','residents.id')
            ->where('residents_status','1')
            ->get();
            // dd($residents);
        return view('admin.rent.add')->with('data',$residents);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'month_type' => 'string',
            'rents_month' => 'string',
            'rents_datetime' => 'string',
            'rents_payment' => 'string',
            // 'rents_slip' => 'string',
            'rooms_id' => 'string',
            'residents_name' => 'string',
            'residents_telephone' => 'string',
            'residents_rent_price' => 'string',
            'residents_id' => 'string',
            'users_name' => 'string'
        ]);
        // dd($request->all());
        $room = Room::where('id',$validated['rooms_id'])->first();
        $rents_month = $validated['rents_month'].'-06';

        $now = Carbon::now();
        if($validated['month_type'] == '1'){
            $rents_month_end = $rents_month;
            $month = Carbon::createFromFormat('Y-m-d', $now)->format('Y-m-d');
            if($month >= $rents_month){
                $get_point = 1; //ได้รับแต้ม
                $price = $validated['residents_rent_price'];
            }else{
                $get_point = 0; //ไม่ได้รับแต้ม
            }
        }else{
            $rents_month_end = $request->rents_month_end.'-06';
            if($month >= $rents_month){
                $get_point = 1; //ได้รับแต้ม
            }else{
                $get_point = 0; //ไม่ได้รับแต้ม
            }
        }

        if($get_point == 1){
            $config_point = ConfigPoint::all();
            $point = (floatval($price) / floatval($config_point->config_points_rate_change));
            $expire = $now->add($config_point->config_points_expire, 'day');
            Rent::create([
                'points_amount' => $point,
                'points_expire' => Carbon::createFromFormat('Y-m-d', $expire)->format('Y-m-d'),
                'residents_id' => $validated['residents_id']
            ]);
        }

        $date = date('Y-m-d_H-i-s');

        $img = $request->file('rents_slip');
        $picture_extension = $img->getClientOriginalExtension();
        $picture = "slip_".$date.".".$picture_extension;
        $path = public_path('/slip');
        // dd($path);
        $img->move($path, $picture);
        // $request->rents_slip->storeAs('/slip', $picture);
        // $picture_url = Storage::url("slip_".$date.".".$picture_extension);

        $rents = Rent::create([
            'rents_month' => $rents_month,
            'rents_month_end' => $rents_month_end,
            'rents_datetime' => $validated['rents_datetime'],
            'rents_slip' => $picture,
            'rents_payment' => $validated['rents_payment'],
            'rooms_number' => $room->rooms_number,
            'rooms_house_number' => $room->rooms_house_number,
            'residents_name' => $validated['residents_name'],
            'residents_telephone' => $validated['residents_telephone'],
            'residents_rent_price' => $validated['residents_rent_price'],
            'residents_id' => $validated['residents_id'],
            'users_name' => $validated['users_name']
        ]);

        $ip = $_SERVER['REMOTE_ADDR'];
        $date = @date("d/m/Y H:i:s");
        // $content = ' \n'.$date.'-->IP: '.$ip.'\n\t\t\t--> content:'.
        //             'rents_month->: '.$rents_month.'\t\t rents_datetime->: '.$validated['rents_datetime'].'\t\t rents_slip->: '.$picture.
        //             '\r\n rooms_number->: '.$room->rooms_number.'\t\t rooms_house_number->: '.$room->rooms_house_number.'\t\t residents_name->: '.$validated['residents_name'].
        //             '\r\n residents_telephone->: '.$validated['residents_telephone'].'\t\t residents_rent_price->: '.$validated['residents_rent_price'].'\t\t residents_id->: '.$validated['residents_id'].
        //             '\r\n users_name->: '.$validated['users_name'];
        $content = '    '.$date.'-->IP: '.$ip.
                    '   rents_month->: '.$rents_month.'   rents_month_end->: '.$rents_month_end.'   rents_payment->: '.$validated['rents_payment'].'       rents_datetime->: '.$validated['rents_datetime'].'      rents_slip->: '.$picture.
                    '   rooms_number->: '.$room->rooms_number.'     rooms_house_number->: '.$room->rooms_house_number.'     residents_name->: '.$validated['residents_name'].
                    '   residents_telephone->: '.$validated['residents_telephone'].'        residents_rent_price->: '.$validated['residents_rent_price'].'      residents_id->: '.$validated['residents_id'].
                    '   ผู้บันทึก->: '.$validated['users_name'];

        File::makeDirectory("rent/".date("Ymd"), $mode = 0777, true, true);
        $random = rand(123456,999999);
        $objFopen= fopen("rent/".date("Ymd")."/".date("His_").$random.".log","w+");
        $pathFile = "rent/".date("Ymd")."/".date("His_").$random.".log";
        $result=fwrite($objFopen,$content);
        fclose($objFopen);

        if($rents->id){
            return redirect()->route('rents')->with('message','success');
        }else{
            return redirect()->back()->with('message','error');
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rents = Rent::where('id',$id)->first();
        return view('admin.rent.detail')->with('data',$rents);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rents = Rent::where('id',$id)->first();
            // dd($rents);
        return view('admin.rent.edit')->with('data',$rents);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'id' => 'string',
            'rents_month' => 'string',
            'rents_datetime' => 'string',
            'residents_rent_price' => 'string',
            'users_name' => 'string'
        ]);
        // dd($request->all());
        $rents_month = $validated['rents_month'].'-06';

        if($request->file('rents_slip')){
            $rent = Rent::where('id',$validated['id'])->first();
            $image_path = "slip/".$rent->rents_slip;  // path image
            if (file_exists("slip")) {
                unlink($image_path);
            }

            $date = date('Y-m-d_H-i-s');
            $img = $request->file('rents_slip');
            // $sourceProperties = getimagesize($img);
            $picture_extension = $img->getClientOriginalExtension();
            $picture = "slip_".$date.".".$picture_extension;
            $path = public_path('/slip');
            $img->move($path, $picture);

            // $imageType = $sourceProperties[2];
            // switch ($imageType) {
        
            //     case IMAGETYPE_PNG:
            //         $imageResourceId = imagecreatefrompng($img); 
            //         $targetLayer = $this->imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
            //         imagepng($targetLayer,$path. $picture);
            //         break;
        
        
            //     case IMAGETYPE_GIF:
            //         $imageResourceId = imagecreatefromgif($img); 
            //         $targetLayer = $this->imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
            //         imagegif($targetLayer,$path. $picture);
            //         break;
        
        
            //     case IMAGETYPE_JPEG:
            //         $imageResourceId = imagecreatefromjpeg($img); 
            //         $targetLayer = $this->imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
            //         imagejpeg($targetLayer,$path. $picture);
            //         break;
        
        
            //     default:
            //         echo "Invalid Image type.";
            //         exit;
            //         break;
            // }


            // dd($path);
            // $img->move($path, $picture);
            // $request->rents_slip->storeAs('/slip', $picture);
            // $picture_url = Storage::url("slip_".$date.".".$picture_extension);
    
            $rents = Rent::where('id',$validated['id'])->update([
                'rents_month' => $rents_month,
                'rents_datetime' => $validated['rents_datetime'],
                'rents_slip' => $picture,
                'residents_rent_price' => $validated['residents_rent_price'],
                'users_name' => $validated['users_name']
            ]);
        }else{
            $picture = '';
            $rents = Rent::where('id',$validated['id'])->update([
                'rents_month' => $rents_month,
                'rents_datetime' => $validated['rents_datetime'],
                'residents_rent_price' => $validated['residents_rent_price'],
                'users_name' => $validated['users_name']
            ]);
        }

        $ip = $_SERVER['REMOTE_ADDR'];
        $date = @date("d/m/Y H:i:s");
        $content = '    '.$date.'-->IP: '.$ip.
                    '   rents_month->: '.$rents_month.' rents_datetime->: '.$validated['rents_datetime'].'  rents_slip->: '.$picture.
                    '   residents_rent_price->: '.$validated['residents_rent_price'].
                    '   ผู้บันทึก->: '.$validated['users_name'];

        File::makeDirectory("rent/".date("Ymd"), $mode = 0777, true, true);
        $random = rand(123456,999999);
        $objFopen= fopen("rent/".date("Ymd")."/".date("His_").$random."_update.log","w+");
        $pathFile = "rent/".date("Ymd")."/".date("His_").$random."_update.log";
        $result=fwrite($objFopen,$content);
        fclose($objFopen);

        if($rents){
            return redirect()->route('rents')->with('message','edit');
        }else{
            return redirect()->back()->with('message','error');
        }
        //
    }

    function imageResize($imageResourceId,$width,$height) {
        $targetWidth = $width < 1280 ? $width : 1280 ;
        $targetHeight = ($height/$width)* $targetWidth;
    
        $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
        imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
    
        return $targetLayer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rent = Rent::where('id',$id)->first();

        $ip = $_SERVER['REMOTE_ADDR'];
        $date = @date("d/m/Y H:i:s");
        $content = '    '.$date.'-->IP: '.$ip.
                    '   rents_month->: '.$rent->rents_month.'   rents_datetime->: '.$rent->rents_datetime.' '.
                    '   rooms_number->: '.$rent->rooms_number.' rooms_house_number->: '.$rent->rooms_house_number.' residents_name->: '.$rent->residents_name.
                    '   residents_telephone->: '.$rent->residents_telephone.'   residents_rent_price->: '.$rent->residents_rent_price.' residents_id->: '.$rent->residents_id.
                    '   ผู้บันทึก->: '.$rent->users_name.'   ผู้แจ้ง->: '.auth('user')->user()->users_name;
                    
        File::makeDirectory("rent/".date("Ymd"), $mode = 0777, true, true);
        $random = rand(123456,999999);
        $objFopen= fopen("rent/".date("Ymd")."/".date("His_").$random."_delete.log","w+");
        $pathFile = "rent/".date("Ymd")."/".date("His_").$random."_delete.log";
        $result=fwrite($objFopen,$content);
        fclose($objFopen);

        $list_delete = ListDelete::create([
            'rents_id' => $rent->id,
            'rents_month' => $rent->rents_month,
            'rents_month_end' => $rent->rents_month_end,
            'rents_datetime' => $rent->rents_datetime,
            'rents_slip' => $rent->rents_slip,
            'rents_payment' => $rent->rents_payment,
            'rooms_number' => $rent->rooms_number,
            'rooms_house_number' => $rent->rooms_house_number,
            'residents_name' => $rent->residents_name,
            'residents_telephone' => $rent->residents_telephone,
            'residents_rent_price' => $rent->residents_rent_price,
            'residents_id' => $rent->residents_id,
            'users_name' => $rent->users_name,
            'informer' => auth('user')->user()->users_name
        ]);

        // $image_path = "slip/".$rent->rents_slip;  // path image
        // if (file_exists("slip")) {
        //     unlink($image_path);
        // }

        $rents = Rent::where('id',$id)->delete();
        if($rents){
            return redirect()->route('rents')->with('message','list-delete');
        }else{
            return redirect()->route('rents')->with('message','error');
        }

        //
    }
}
