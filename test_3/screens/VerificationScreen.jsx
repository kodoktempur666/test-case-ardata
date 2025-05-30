import React, {useState} from 'react';
import {View, TextInput, Text, TouchableOpacity} from 'react-native';

const VerificationCodeScreen = ({route, navigation}) => {
  const {email} = route.params;
  const [code, setCode] = useState('');

  const handleVerify = () => {
    if (code.length !== 6) {
      alert('Kode verifikasi harus 6 digit');
      return;
    }
    // Lakukan validasi kode disini (misalnya cek API)
    alert(`Kode verifikasi untuk ${email} berhasil diverifikasi!`);
    // Setelah verifikasi, bisa navigasi ke screen lain misalnya Reset Password
    navigation.navigate('Login');
  };

  return (
    <View style={{flex: 1, padding: 20, justifyContent: 'center'}}>
      <Text>Masukkan kode verifikasi yang dikirim ke email: {email}</Text>
      <TextInput
        placeholder="Kode verifikasi"
        value={code}
        onChangeText={setCode}
        style={{
          borderWidth: 1,
          borderColor: '#ccc',
          borderRadius: 10,
          height: 50,
          paddingHorizontal: 10,
          marginVertical: 20,
          fontSize: 18,
          letterSpacing: 10,
          textAlign: 'center',
        }}
        keyboardType="number-pad"
        maxLength={6}
      />
      <TouchableOpacity
        onPress={handleVerify}
        style={{
          backgroundColor: '#50a8a1',
          padding: 15,
          borderRadius: 10,
          alignItems: 'center',
        }}>
        <Text style={{color: 'white', fontWeight: 'bold'}}>Verifikasi</Text>
      </TouchableOpacity>
    </View>
  );
};

export default VerificationCodeScreen;
