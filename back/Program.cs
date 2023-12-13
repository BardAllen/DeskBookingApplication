var builder = WebApplication.CreateBuilder(args);


builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();

var app = builder.Build();

// Configure the HTTP request pipeline.
if (app.Environment.IsDevelopment())
{
    app.UseSwagger();
    app.UseSwaggerUI();
}

app.UseHttpsRedirection();

var offices = new List<Office>
{
    new Office("Eastleigh", new List<int> { 329 }, 1),
    new Office("Birmingham", new List<int> { 24 }, 1),
    new Office("Hoxton", new List<int> { 20, 22, 24 }, 3),
    new Office("Leatherhead", new List<int> { 168 }, 1),
    new Office("Leeds", new List<int> { 52 }, 1),
    new Office("Manchester", new List<int> { 186 }, 1),
    new Office("Worthing", new List<int> { 60 }, 1),
};

app.MapGet("/api/offices", () =>
{
    return offices;
})
.WithName("GetOffices")
.WithOpenApi();

app.Run();

record Office(string Name, List<int> Desks, int Floors);
