struct testA;

struct testA
{
  long long a;
  long long b;
};

extern long long
add (long long a, long long b)
{
  struct testA c;

main:
  c.a = a;
  c.b = b;
  return c.a + c.b;
}

