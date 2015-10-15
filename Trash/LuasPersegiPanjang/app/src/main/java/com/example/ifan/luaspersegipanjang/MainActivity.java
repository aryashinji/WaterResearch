package com.example.ifan.luaspersegipanjang;

        import android.app.Activity;
        import android.os.Bundle;
//import android.text.Editable;
        import android.view.View;
        import android.widget.Button;
        import android.widget.EditText;
        import android.view.View.OnClickListener;

public class MainActivity extends Activity {
    /** Called when the activity is first created. */
    private EditText textPanjang;
    private EditText textLebar;
    private EditText textHasil;
    private EditText textKeliling;
    private Button hitungLuas;
    private Button btnBersihkan;
    private Button btnKeliling;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        textPanjang=(EditText)findViewById(R.id.textPanjang);
        textLebar=(EditText)findViewById(R.id.textLebar);
        textHasil=(EditText)findViewById(R.id.textLuas);
        textKeliling=(EditText)findViewById(R.id.textKeliling);
        hitungLuas=(Button)findViewById(R.id.btnLuas);
        btnBersihkan=(Button)findViewById(R.id.btnClear);
        btnKeliling=(Button)findViewById(R.id.btnKeliling);
        hitungLuas.setOnClickListener(new OnClickListener() {

            public void onClick(View v) {
                // TODO Auto-generated method stub
                hitungLuasPersegi(v);
            }
        });

        btnBersihkan.setOnClickListener(new OnClickListener() {

            public void onClick(View v) {
                // TODO Auto-generated method stub
                bersihkanField(v);
            }
        });
        btnKeliling.setOnClickListener(new OnClickListener() {

            public void onClick(View v) {
                // TODO Auto-generated method stub
                hitungKelilingPersegi(v);
            }
        });
    }
    public void hitungKelilingPersegi(View view){
        try{
            int panjang=Integer.parseInt(textPanjang.getText().toString());
            int lebar=Integer.parseInt(textLebar.getText().toString());
            int keliling=(2*panjang)+(2*lebar);
            textKeliling.setText(String.valueOf(keliling));
        }
        catch(Exception e){
            e.printStackTrace();
        }
    }
    public void bersihkanField(View view){
        textPanjang.setText("");
        textLebar.setText("");
        textHasil.setText("");
        textKeliling.setText("");
        return;
    }
    public void hitungLuasPersegi(View view){
        try{
            int panjang=Integer.parseInt(textPanjang.getText().toString());
            int lebar=Integer.parseInt(textLebar.getText().toString());
            int luas=panjang*lebar;
            textHasil.setText(String.valueOf(luas));
        }
        catch(Exception e){
            e.printStackTrace();
        }
    }
}