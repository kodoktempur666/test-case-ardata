import React, {useState} from 'react';
import {
  View,
  TextInput,
  Text,
  TouchableOpacity,
  Pressable,
  Image,
  StyleSheet,
} from 'react-native';
import auth from '@react-native-firebase/auth';
import firestore from '@react-native-firebase/firestore';

const LoginScreen = ({navigation}) => {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const handleLogin = () => {
    if (!email || !password) {
      alert('Email dan password harus diisi!');
      return;
    }

    // Login menggunakan Firebase Authentication
    auth()
      .signInWithEmailAndPassword(email, password)
      .then(userCredential => {
        // Ambil user ID
        const userId = userCredential.user.uid;

        // Mengambil data pengguna dari Firestore
        firestore()
          .collection('users')
          .doc(userId)
          .get()
          .then(doc => {
            if (doc.exists) {
              // Ambil data nama dan email
              const userData = doc.data();
              const {name, email} = userData;

              // Lanjutkan ke DashboardScreen dengan data pengguna
              navigation.replace('Dashboard', {
                userId,
                name,
                email,
              });
            } else {
              alert('Data pengguna tidak ditemukan di Firestore');
            }
          })
          .catch(error => {
            alert('Terjadi kesalahan: ' + error.message);
          });
      })
      .catch(error => {
        if (error.code === 'auth/user-not-found') {
          alert('Pengguna tidak ditemukan');
        } else if (error.code === 'auth/wrong-password') {
          alert('Password salah');
        } else {
          alert('Terjadi kesalahan: ' + error.message);
        }
      });
  };

  return (
    <View style={{padding: 20, flex: 1}}>
      <Image
        source={require('../assets/ilust-web-ardata1-1.png')}
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
        onChangeText={setEmail}
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
        onChangeText={setPassword}
      />
      <TouchableOpacity onPress={() => navigation.navigate('ResetPassword')}>
        <Text
          style={{
            color: '#50a8a1',
            fontSize: 16,
            fontFamily: 'Poppins',
            alignSelf: 'flex-end',
            fontWeight: 'bold',
            padding: 10,
            textDecorationLine: 'underline',
          }}>
          Lupa Kata Sandi?
        </Text>
      </TouchableOpacity>

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
        onPress={handleLogin}>
        <Text style={{color: '#fff', fontSize: 16, fontWeight: 'bold'}}>
          Login
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
          Belum Punya Akun?{' '}
        </Text>
        <TouchableOpacity onPress={() => navigation.navigate('Register')}>
          <Text
            style={{
              color: '#50a8a1',
              fontSize: 16,
              fontWeight: 'bold',
              fontFamily: 'Poppins',
              textDecorationLine: 'underline',
            }}>
            Daftar Sekarang
          </Text>
        </TouchableOpacity>
      </View>
    </View>
  );
};

export default LoginScreen;
