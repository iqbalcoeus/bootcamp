#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
using namespace std;


int main() {
  /* Enter your code here. Read input from STDIN. Print output to STDOUT */  
  int M=0;
  int N=0;
  int T=0;
  int Drty=0;

  cin>>T;
  while(T>0)
  {
    int  m1=1;
    int m2=2;
    int last=0;
    Drty=0;
    int i=0;
    bool f=false;
    cin>>N;
    int j=N-1;
    int *toilet=new int[N];
    cin>>M;
    if(N==1)
    {
      last=1;
      Drty=M-1;
    }
    else{

      for (int i=0;i<N;i++)
        toilet[i]=0;
      while(m1<=M )
      {


        f=false;

        {
          Drty=toilet[i];
          toilet[i]++;
          last=i+1;

          if(m1==M)
            break;

          if(j<=i)
          {
            f=true;

            j=N-1;
            i=0;
          }

          {

            Drty=toilet[j];
            toilet[j]++;
            last=j+1;
            if(!f)
              i++;

            j--;
          }
          m1=m1+2;
          m2=m2+2;
          if(i>j)
          {

            i=0;
            j=N-1;
          }
        }
      }
    }

    cout <<last << " " << Drty<<endl;

    delete [] toilet;
    toilet=0;
    T--;
  }

  return 0;
}

