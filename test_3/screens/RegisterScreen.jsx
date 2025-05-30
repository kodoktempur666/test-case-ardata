import React, {useState} from 'react';
import {
  View,
  Text,
  TextInput,
  Image,
  TouchableOpacity,
  Pressable,
} from 'react-native';
import auth from '@react-native-firebase/auth';
import firestore from '@react-native-firebase/firestore';

const RegisterScreen = ({navigation}) => {
  // Mendeklarasikan state untuk email, password, dan name
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [name, setName] = useState('');

  const register = () => {
    // Buat user baru dengan email dan password
    auth()
      .createUserWithEmailAndPassword(email, password)
      .then(async userCredential => {
        // Mendapatkan user id dari Firebase Auth
        const userId = userCredential.user.uid;

        // Menyimpan data ke Firestore setelah pendaftaran berhasil
        await firestore()
          .collection('users') // Nama koleksi di Firestore
          .doc(userId) // Menyimpan dokumen dengan ID user (uid)
          .set({
            email: email, // Menyimpan email pengguna
            name: name, // Menyimpan nama pengguna
            userId: userId, // Menyimpan user ID
            createdAt: firestore.FieldValue.serverTimestamp(), // Menyimpan waktu pendaftaran
          });

        // Setelah data disimpan, menampilkan alert dan navigasi ke halaman Login
        alert('Pendaftaran berhasil');
        navigation.navigate('Login');
      })
      .catch(error => {
        if (error.code === 'auth/email-already-in-use') {
          alert('Email sudah terdaftar');
        } else {
          alert(error.message);
        }
      });
  };

  return (
    <View style={{justifyContent: 'center', padding: 20}}>
      <Text
        style={{
          fontSize: 24,
          textAlign: 'center',
          fontWeight: 'bold',
          color: '#386067',
          marginTop: 40,
        }}>
        DAFTAR SEKARANG
      </Text>
      <Image
        source={require('../assets/ilust-web-ardata2.png')}
        style={{margin: 20, width: 300, height: 300, alignSelf: 'center'}}
      />
      <TextInput
        style={{
          height: 50,
          borderColor: 'gray',
          borderWidth: 2,
          marginVertical: 10,
          paddingLeft: 10,
          borderRadius: 20,
        }}
        placeholder="E-mail"
        placeholderTextColor="#888"
        value={email}
        onChangeText={setEmail} // Menyimpan nilai email ke state
      />
      <TextInput
        style={{
          height: 50,
          borderColor: 'gray',
          borderWidth: 2,
          marginVertical: 10,
          paddingLeft: 10,
          borderRadius: 20,
          color: 'black',
        }}
        placeholder="Password"
        placeholderTextColor="#888"
        secureTextEntry
        value={password}
        onChangeText={setPassword} // Menyimpan nilai password ke state
      />
      <TextInput
        style={{
          height: 50,
          borderColor: 'gray',
          borderWidth: 2,
          marginVertical: 10,
          paddingLeft: 10,
          borderRadius: 20,
        }}
        placeholder="Nama Lengkap"
        placeholderTextColor="#888"
        value={name}
        onChangeText={setName} // Menyimpan nilai nama ke state
      />
      <Pressable
        style={({pressed}) => [
          {
            backgroundColor: pressed ? '#386067' : '#50a8a1',
            height: 50,
            padding: 10,
            borderRadius: 20,
            alignItems: 'center',
            marginTop: 20,
          },
        ]}
        onPress={register}>
        <Text style={{color: '#fff', fontSize: 16, fontWeight: 'bold'}}>
          Sign Up
        </Text>
      </Pressable>
      <View
        style={{
          flexDirection: 'row',
          justifyContent: 'center',
          alignItems: 'center',
          marginTop: 20,
        }}>
        <Text
          style={{
            fontSize: 16,
            fontFamily: 'Poppins',
            fontWeight: '600',
          }}>
          Sudah punya akun?{' '}
        </Text>
        <TouchableOpacity onPress={() => navigation.navigate('Login')}>
          <Text
            style={{
              color: '#50a8a1',
              fontSize: 16,
              fontWeight: 'bold',
              fontFamily: 'Poppins',
              textDecorationLine: 'underline',
            }}>
            Masuk
          </Text>
        </TouchableOpacity>
      </View>
    </View>
  );
};

export default RegisterScreen;
