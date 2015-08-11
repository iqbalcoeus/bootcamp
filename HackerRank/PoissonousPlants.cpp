#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
using namespace std;


int main() {
  /* Enter your code here. Read input from STDIN. Print output to STDOUT */  
  int n=0;
  cin>>n;
  int *P =new int[n];
  int pr=0;
  int day=0;
  if(n==1)
  {

    cout<<0;
    return 0;
  }
  for(int i=0;i<n;i++)
  {

    cin>>P[i];

  }
  string str=
    int count=n;
  int c=0;
  while(pr !=count)
  {
    pr=count;
    c=1;
    for(int i=1;i<count;i++)
    {

      if(!(P[i]-P[i-1]>=1))
      {

        P[c]=P[i];
        c++;
      }    
    }
    count=c;
    day++;
  }
  cout<<day-1<<endl;
  delete [] P;
  P=0;

  return 0;

}

