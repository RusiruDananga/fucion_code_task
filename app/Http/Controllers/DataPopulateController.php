<?php

namespace App\Http\Controllers;

use App\Models\DataSourceX;
use App\Models\Orders;
use App\Models\Properties;
use App\Models\PropertyTypes;
use App\Models\Packages;
use App\Models\Aminities;
use App\Models\PropertyAminities;
use App\Models\PropertyPurposes;
use App\Models\Cities;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataPopulateController extends Controller
{
    //function to read all the data in data_source_x table
    public function readData()
    {
        //this will return all the data in data_source_x table
        return $all_data = DataSourceX::get();
    }

    //function to insert data to users table
    public function insertUser(Request $request)
    {
        //validate user inputs using validator
        $request->validate([
            'user_id' => 'required'
        ]);

        //assign user inputs to the variables
        $user_id = $request->user_id;
        $slug = $request->slug;
        $email = $request->email;
        $image = $request->image;
        $about = $request->about;
        $icon_one = $request->icon_one;
        $link_one = $request->link_one;
        $icon_two = $request->icon_two;
        $link_two = $request->link_two;
        $icon_three = $request->icon_three;
        $link_three = $request->link_three;
        $icon_four = $request->icon_four;
        $link_four = $request->link_four;
        $password = $request->password;
        $website = $request->website;
        $banner_image = $request->banner_image;

        //get the specific user details from the data_source_x table according to the given user id
        $person_data = DataSourceX::where('id', $user_id)->first();
        
        //mapping data to the table fields
        $insert_user_data['name'] = $person_data['name'];
        $insert_user_data['slug'] = $person_data['slug'];
        $insert_user_data['organisation'] = $person_data['organisation'];
        $insert_user_data['email'] = $email;
        $insert_user_data['image'] = $image;
        $insert_user_data['about'] = $about;
        $insert_user_data['icon_one'] = $icon_one;
        $insert_user_data['link_one'] = $link_one;
        $insert_user_data['icon_two'] = $icon_two;
        $insert_user_data['link_two'] = $link_two;
        $insert_user_data['icon_three'] = $icon_three;
        $insert_user_data['link_three'] = $link_three;
        $insert_user_data['icon_four'] = $icon_four;
        $insert_user_data['link_four'] = $link_four;
        $insert_user_data['password'] = Hash::make($password);
        $insert_user_data['website'] = $website;
        $insert_user_data['banner_image'] = $banner_image;

        //insert data to the table
        $result = User::create($insert_user_data);

        //this will return the response if it is successfully inserted or not
        if($result)
        {
            return "Success";
        }
        else
        {
            return "Error";
        }

    }

    public function insertOrder(Request $request)
    {
        //validate user inputs using validator
        $request->validate([
            'user_id' => 'required',
            'order_id' => 'required',
            'package_name' => 'required',
            'purchase_date' => 'required',
            'expired_day' => 'required',
        ]);

        //assign user inputs to the variables
        $user_id = $request->user_id;
        $order_id = $request->order_id;
        $package_name = $request->package_name;
        $purchase_date = $request->purchase_date;
        $expired_day = $request->expired_day;
        $expired_date = $request->expired_date;
        $payment_method = $request->payment_method;
        $transaction_id = $request->transaction_id;
        $payment_status = $request->payment_status;
        $amount_usd = $request->amount_usd;
        $amount_real_currency = $request->amount_real_currency;
        $currency_type = $request->currency_type;
        $currency_icon = $request->currency_icon;
        $password = $request->password;
        $status = $request->status;

        //get the specific user details from the data_source_x table according to the given user id
        $person_data = DataSourceX::where('id', $user_id)->first();

        //get the specific user details from the packages table according to the given package name
        $package_data = Packages::where('package_name', $package_name)->first();
        
        //mapping data to the table fields
        $insert_order_data['order_id'] = $order_id;
        $insert_order_data['user_id'] = $user_id;
        $insert_order_data['package_id'] = $package_data['organisation'];
        $insert_order_data['purchase_date'] = $purchase_date;
        $insert_order_data['expired_day'] = $expired_day;
        $insert_order_data['expired_date'] = $expired_date;
        $insert_order_data['payment_method'] = $payment_method;
        $insert_order_data['transaction_id'] = $transaction_id;
        $insert_order_data['payment_status'] = $payment_status;
        $insert_order_data['amount_usd'] = $amount_usd;
        $insert_order_data['amount_real_currency'] = $amount_real_currency;
        $insert_order_data['currency_type'] = $currency_type;
        $insert_order_data['currency_icon'] = $currency_icon;
        $insert_order_data['status'] = $status;

        //insert data to the table
        $result = Orders::create($insert_order_data);

        //this will return the response if it is successfully inserted or not
        if($result)
        {
            return "Success";
        }
        else
        {
            return "Error";
        }
    }

    public function insertProperties(Request $request)
    {
        //validate user inputs using validator
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'user_id' => 'required',
            'property_type' => 'required',
            'city_name' => 'required',
            'property_purpose' => 'required',
            'aminity_name' => 'required',
        ]);

        //assign user inputs to the variables
        $user_id = $request->user_id;
        $user_type = $request->user_type;
        $admin_id = $request->admin_id;
        $property_type = $request->property_type;
        $city_name = $request->city_name;
        $listing_package_id = $request->listing_package_id;
        $property_purpose = $request->property_purpose;
        $aminity_name = $request->aminity_name;
        $title = $request->title;
        $slug = $request->slug;
        $views = $request->views;
        $address = $request->address;
        $phone = $request->phone;
        $email = $request->email;
        $website = $request->website;
        $description = $request->description;
        $file = $request->file;
        $thumbnail_image = $request->thumbnail_image;
        $banner_image = $request->banner_image;
        $number_of_unit = $request->number_of_unit;
        $number_of_room = $request->number_of_room;
        $number_of_bedroom = $request->number_of_bedroom;
        $number_of_bathroom = $request->number_of_bathroom;
        $number_of_floor = $request->number_of_floor;
        $number_of_kitchen = $request->number_of_kitchen;
        $number_of_parking = $request->number_of_parking;
        $area = $request->area;
        $google_map_embed_code = $request->google_map_embed_code;
        $price = $request->price;
        $period = $request->period;
        $video_link = $request->video_link;
        $is_featured = $request->is_featured;
        $verified = $request->verified;
        $top_property = $request->top_property;
        $urgent_property = $request->urgent_property;
        $status = $request->status;
        $seo_title = $request->seo_title;
        $expired_date = $request->expired_date;
        $seo_description = $request->seo_description;
        $aminity_status = $request->aminity_status;

        //get the specific user details from the data_source_x table according to the given user id
        $person_data = DataSourceX::where('id', $user_id)->first();

        //get the specific user details from the properties table according to the given property type
        $property_type_data = Properties::where('type', $property_type)->first();

        //get the specific user details from the property_purpose table according to the given property purpose
        $property_purpose_data = PropertyPurposes::where('purpose', $property_purpose)->first();

        //get the specific user details from the cities table according to the given city name
        $city_data = Cities::where('name', $city_name)->first();

        //mapping data to the table fields
        $insert_property_data['user_type'] = $user_type;
        $insert_property_data['admin_id'] = $admin_id;
        $insert_property_data['user_id'] = $user_id;
        $insert_property_data['property_type_id'] = $property_type_data['id'];
        $insert_property_data['city_id'] = $city_data['id'];
        $insert_property_data['listing_package_id'] = $listing_package_id;
        $insert_property_data['property_purpose_id'] = $property_purpose_data['id'];
        $insert_property_data['title'] = $title;
        $insert_property_data['slug'] = $slug;
        $insert_property_data['views'] = $views;
        $insert_property_data['address'] = $address;
        $insert_property_data['phone'] = $phone;
        $insert_property_data['email'] = $email;
        $insert_property_data['website'] = $website;
        $insert_property_data['description'] = $description;
        $insert_property_data['file'] = $file;
        $insert_property_data['thumbnail_image'] = $thumbnail_image;
        $insert_property_data['banner_image'] = $banner_image;
        $insert_property_data['number_of_unit'] = $number_of_unit;
        $insert_property_data['number_of_room'] = $number_of_room;
        $insert_property_data['number_of_bedroom'] = $number_of_bedroom;
        $insert_property_data['number_of_bathroom'] = $number_of_bathroom;
        $insert_property_data['number_of_floor'] = $number_of_floor;
        $insert_property_data['number_of_kitchen'] = $number_of_kitchen;
        $insert_property_data['number_of_parking'] = $number_of_parking;
        $insert_property_data['area'] = $area;
        $insert_property_data['google_map_embed_code'] = $google_map_embed_code;
        $insert_property_data['price'] = $price;
        $insert_property_data['period'] = $period;
        $insert_property_data['video_link'] = $video_link;
        $insert_property_data['is_featured'] = $is_featured;
        $insert_property_data['verified'] = $verified;
        $insert_property_data['top_property'] = $top_property;
        $insert_property_data['urgent_property'] = $urgent_property;
        $insert_property_data['status'] = $status;
        $insert_property_data['seo_title'] = $seo_title;
        $insert_property_data['expired_date'] = $expired_date;
        $insert_property_data['seo_description'] = $seo_description;

        //insert data to the table
        $result = Properties::create($insert_property_data);

        //get the inserted row id
        $property_id = $result['id'];

        //get the specific user details from the aminities table according to the given aminity name
        $aminity_data = Aminities::where('aminity', $aminity_name)->first();

        //mapping data to the table fields
        $insert_property_aminity_data['property_id'] = $property_type_data['id'];
        $insert_property_aminity_data['aminity_id'] = $aminity_data['id'];
        $insert_property_aminity_data['status'] = $aminity_status;

        //insert data to the table
        $result2 = PropertyAminities::create($insert_property_data);

        //this will return the response if it is successfully inserted or not
        if($result && $result2)
        {
            return "Success";
        }
        else
        {
            return "Error";
        }
    }

    public function getIndexData(Request $request)
    {
        //this will return all the data in property_purposes table
        $property_purpose = PropertyPurposes::get();

        //this will return all the data in property_types table
        $property_types = PropertyTypes::get();

        //this will return all the data in packages table
        $packages = Packages::get();

        //this will return all the data in property_aminities table
        $property_aminities = PropertyAminities::get();
    }

    public function getCity(Request $request)
    {
        //this will get all the data in data_source_x table
        $all_data = DataSourceX::get();

        //below code will affect for each row
        foreach($all_data as $data)
        {
            //first it will get the matching row from property table according to the address
            $property_details = Properties::where('address', $data['address'])->first();
            //from that row can get the city id
            $city_id = $property_details['city_id'];

            //this will get the matching row from cities table according to the city id
            $city_details = Cities::where('id', $city_id)->first();
            //from that row can get the city name and it will append to the array
            $data['city_name'] = $city_details['name'];
        }

        //finally response the city names for each row in data_source_x table
        return $all_data;

    }
}
