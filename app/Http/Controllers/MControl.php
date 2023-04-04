<?php 
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\DB;
    use App\Models\MModel;

    class MControl extends Controller
    {
        public function getmahasiswa()
        {
            $dt_mahasiswa = DB::table('mahasiswa')
            ->join('jurusan', 'mahasiswa.idjurusan', '=', 'jurusan.idjurusan')
            ->select('mahasiswa.id', 'mahasiswa.nama', 'mahasiswa.jeniskelamin', 'mahasiswa.alamat', 'jurusan.namajurusan')
            ->get();

            // $dt_mahasiswa=mahasiswa::get();
            return response()->json ($dt_mahasiswa);
        }

        public function getid()
        {
            $dt_mahasiswa=mahasiswa::where('id','=',$id)->get();
            return response()->json($dt_mahasiswa);
        }

        public function createmahasiswa(Request $req){
            $validate = Validator::make($req->all(),[
                'nama'=>'required',
                'jeniskelamin'=>'required',
                'alamat'=>'required',
                'id_jurusan'=>'required',
            ]);
            if($validate->fails()){
                return response()->json($validate->errors()->toJson());
            }
            $create = MModel::create([
                'nama'=>$req->nama,
                'jeniskelamin'=>$req->jeniskelamin,
                'alamat'=>$req->alamat,
                'id_jurusan'=>$req->id_jurusan,
            ]);
            if($create){
                return response()->json(['status'=>true, 'message'=>'Sukses menambah data mahasiswa.']);
            }else{
                return response()->json(['status'=>false, 'message'=>'Gagal menambah data mahasiswa.']);
            }
        }

        public function updatemahasiswa(Request $req, $id){
            $validate = Validator::make($req->all(),[
                'nama'=>'required',
                'jeniskelamin'=>'required',
                'alamat'=>'required',
                'id_jurusan'=>'required',
            ]);
            if($validate->fails()){
                return response()->json($validate->errors()->toJson());
            }
            $update = MModel::where('id', $id)->update([
                'nama'=>$req->get('nama'),
                'jeniskelamin'=>$req->get('jeniskelamin'),
                'alamat'=>$req->get('alamat'),
                'id_jurusan'=>$req->get('id_jurusan'),
    
            ]);
            if($update){
                return response()->json(['status'=>true, 'message'=>'Sukses update data mahasiswa.']);
    
            }else{
                return response()->json(['status'=>false, 'message'=>'Gagal update data mahasiswa.']);
            }
        }
    
    
        public function deletemahasiswa($id){
            $delete = MModel::where('id', $id)->delete();
            if($delete){
                return response()->json(['status'=>true, 'message' => 'Sukses delete data mahasiswa.']);
            }else{
                return response()->json(['status'=>false, 'message' => 'Gagal data mahasiswa.']);
            }
        }
    
    }

