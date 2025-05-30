import React, { useState } from 'react';
import { View, TextInput, Text, TouchableOpacity } from 'react-native';
import auth from '@react-native-firebase/auth'; // Pastikan Firebase sudah terpasang

const ResetPasswordScreen = ({ navigation }) => {
  const [email, setEmail] = useState('');

  const handleLanjut = () => {
    if (!email) {
      alert('Masukkan email terlebih dahulu');
      return;
    }

    // Mengirimkan email reset password menggunakan Firebase Authentication
    auth()
      .sendPasswordResetEmail(email)
      .then(() => {
        alert('Instruksi reset password telah dikirim ke email Anda.');
        // Navigasi ke screen berikutnya, misalnya LoginScreen
        navigation.navigate('Login');
      })
      .catch((error) => {
        if (error.code === 'auth/invalid-email') {
          alert('Email tidak valid.');
        } else if (error.code === 'auth/user-not-found') {
          alert('Pengguna dengan email ini tidak ditemukan.');
        } else {
          alert(error.message);
        }
      });
  };

  return (
    <View style={{ padding: 20, justifyContent: 'center' }}>
      <Text style={{ fontSize: 24, fontWeight: 'bold', marginBottom: 20 }}>
        Atur Ulang Kata Sandi
      </Text>
      <Text style={{ fontSize: 16, marginBottom: 50, color: 'gray' }}>
        Masukkan e-mail yang terdaftar. Kami akan mengirimkan kode verifikasi untuk atur ulang kata sandi.
      </Text>
      <TextInput
        placeholder="Masukkan Email"
        placeholderTextColor="#888"
        value={email}
        onChangeText={setEmail}
        style={{
          borderWidth: 1,
          borderColor: '#ccc',
          borderRadius: 10,
          height: 50,
          paddingHorizontal: 10,
          marginBottom: 20,
        }}
        keyboardType="email-address"
        autoCapitalize="none"
      />
      <TouchableOpacity
        onPress={handleLanjut}
        style={{
          backgroundColor: '#50a8a1',
          padding: 15,
          borderRadius: 10,
          alignItems: 'center',
        }}>
        <Text style={{ color: 'white', fontWeight: 'bold' }}>Lanjut</Text>
      </TouchableOpacity>
    </View>
  );
};

export default ResetPasswordScreen;
